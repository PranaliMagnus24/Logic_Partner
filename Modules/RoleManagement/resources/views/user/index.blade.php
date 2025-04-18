@extends('admin.layouts.layout')

@section('title', 'Users')
@section('admin')
@section('pagetitle', 'Users')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Users</h4>
                    <div class="text-end mb-2">
                        <a href="{{ route('user.create') }}" class="btn btn-success">+</a>
                    </div>

                </div>
                <div class="card-body mt-3">
                    {{-- @livewire('permission-table') --}}
                  <table class="table table-bordered table-striped userList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                @if($user->getRoleNames()->isNotEmpty())
                                    @foreach($user->getRoleNames() as $rolename)
                                        <label class="badge bg-primary mx-1 text-white">{{ $rolename }} </label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @can('update user')
                              <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                              @endcan
                              @can('delete user')
                              <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                              @endcan
                            </td>
                        </tr>

                        @endforeach --}}
                    </tbody>

                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    const userUrl = "{{ route('users.list') }}";
</script>
