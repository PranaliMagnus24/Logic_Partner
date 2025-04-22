<?php

namespace Modules\RoleManagement\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class RoleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
             $roles = Role::query()->orderBy('created_at', 'desc');

             return DataTables::eloquent($roles)
                 ->addIndexColumn()
                 ->addColumn('action', function ($role) {
                     $editUrl = route('role.edit', $role->id);
                     $deleteUrl = route('role.delete', $role->id);
                     $permUrl = route('role.permissions', $role->id);

                     $buttons = '<a href="' . $permUrl . '" class="btn btn-primary btn-sm">Add / Edit Role Permission</a> ';

                     if (Auth::user()->can('update role')) {
                         $buttons .= '<a href="' . $editUrl . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> ';
                     }

                     if (Auth::user()->can('delete role')) {
                         $buttons .= '<a href="' . $deleteUrl . '" class="btn btn-danger btn-sm delete-confirm"><i class="bi bi-trash3-fill"></i></a>';
                     }

                     return $buttons;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
         return view('rolemanagement::role.index');
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
    // public function store(Request $request): RedirectResponse
    // {

    //     $request->validate([
    //         'name' => 'required|string|unique:roles,name',
    //        ]);

    //        Role::create([
    //         'name' => $request->name
    //        ]);

    //        return redirect('roles')->with('success','Role created successfully!');
    // }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permission' => 'nullable|array'
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->filled('permission')) {
            $role->syncPermissions($request->permission);
        }

        return redirect()->route('role.list')->with('success', 'Role created and permissions assigned successfully!');
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

    return redirect('roles')->with('success', 'Permissions added to role successfully!');
}

}
