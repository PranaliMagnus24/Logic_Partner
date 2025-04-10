<?php

namespace Modules\RoleManagement\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $permissions = Permission::query();

        if (request()->has('search')) {
            $permissions->where('name', 'like', '%' . request('search') . '%');
        }

        $permissions = $permissions->orderBy('created_at', 'desc')->paginate(10);

        return view('rolemanagement::permission.index', compact('permissions'));
    }


    public function permissionList(Request $request)
{
    $permissions = Permission::query();

    if ($request->has('search')) {
        $permissions->where('name', 'like', '%' . $request->search . '%');
    }

    $permissions = $permissions->orderBy('created_at', 'desc')->paginate(10);

    // Transform the permissions data to ensure assigned_to is an array
    $permissionsData = $permissions->items();
    foreach ($permissionsData as &$permission) {
        // Assuming assigned_to is a string, convert it to an array
        $permission->assigned_to = is_array($permission->assigned_to) ? $permission->assigned_to : [$permission->assigned_to];
    }

    if ($request->ajax()) {
        return response()->json([
            'data' => $permissionsData,
            'total' => $permissions->total(),
            'current_page' => $permissions->currentPage(),
            'last_page' => $permissions->lastPage(),
            'per_page' => $permissions->perPage(),
        ]);
    }

    return view('rolemanagement::permission.permission_list', compact('permissions'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rolemanagement::permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
           ]);

           Permission::create([
            'name' => $request->name
           ]);
           return redirect('permissions')->with('success','Permission created successfully!');
    }

    public function updatePermission(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        // Add other validation rules as needed
    ]);

    $permission = Permission::findOrFail($id);
    $permission->name = $request->name;
    // Update other fields as necessary
    $permission->save();

    return response()->json(['success' => true]);
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
        $permission = Permission::findOrFail($id);
        return view('rolemanagement::permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name,
        ]);

        return redirect('permissions')->with('success', 'Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect('permissions')->with('success', 'Permission deleted successfully!');
    }
}
