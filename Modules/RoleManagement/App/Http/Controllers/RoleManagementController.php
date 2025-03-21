<?php

namespace Modules\RoleManagement\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $roles = Role::query();

        if (request()->has('search')) {
            $roles->where('name', 'like', '%' . request('search') . '%');
        }

        $roles = $roles->orderBy('created_at', 'desc')->paginate(10);

        return view('rolemanagement::role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rolemanagement::role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
           ]);

           Role::create([
            'name' => $request->name
           ]);

           return redirect('roles')->with('success','Role created successfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('rolemanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('rolemanagement::role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);

        return redirect('roles')->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('roles')->with('success', 'Role deleted successfully!');
    }

    public function permissionToRole($id)
{
    $permissions = Permission::all();
    $role = Role::findOrFail($id);
    // $rolePermissions = DB::table('role_has_permissions')
    //                 ->where('role_id', $role->id)
    //                 ->pluck('permission_id')
    //                 ->all();
    $rolePermissions = DB::table('role_has_permissions')
                       ->where('role_has_permissions.role_id', $role->id)
                       ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                       ->all();
    return view('rolemanagement::role.add_permission', compact('role', 'permissions','rolePermissions'));
}

public function updatePermissionToRole(Request $request, $id)
{
    $request->validate([
        'permission' => 'required|array'
    ]);

    $role = Role::findOrFail($id);
    $role->syncPermissions($request->permission);

    return redirect()->back()->with('success', 'Permissions added to role successfully!');
}

}
