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
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();

        if (request()->has('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
        }

        $users = $users->orderBy('created_at', 'desc')->paginate(10);

        return view('rolemanagement::user.index', compact('users'));
    }

    public function userList(Request $request)
    {
        // Fetch roles
        $roles = Role::pluck('name', 'name')->all();

        // Start building the user query
        $usersQuery = User::with('roles');

        // Apply search filter if provided
        if ($request->has('search')) {
            $usersQuery->where('name', 'like', '%' . $request->search . '%');
        }

        // Get the total user count
        $totalUsers = $usersQuery->count();

        // Paginate the results
        $users = $usersQuery->orderBy('created_at', 'desc')->paginate(10);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'data' => $users->items(),
                'total' => $totalUsers, // Return the total user count
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
            ]);
        }

        // Return the view with roles, users, and total user count
        return view('rolemanagement::user.user_list', compact('roles', 'users', 'totalUsers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('rolemanagement::user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            'phone' => 'required|integer',
        ]);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);

        return redirect('users')->with('success', 'User  created successfully!');
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
        $roles = Role::pluck('name','name')->all();
        $user = User::findOrFail($id);
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('rolemanagement::user.edit', compact('user','roles','userRoles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('users')->with('success', 'User  updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users')->with('success', 'User deleted successfully!');
    }
}
