@extends('admin.layouts.layout')

@section('title', 'Roles')
@section('admin')
@section('pagetitle', 'Role')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Roles</h4>
                </div>
                <div class="card-body mt-3">
                  <div class="text-end mb-2">
                    <a href="{{ route('role.create') }}" class="btn btn-primary mt-0">+</a>
                  </div>
                  <table class="table table-bordered table-striped rolesList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($roles as $role)
                        <tr>
                            <td>{{ $roles->firstItem() + $loop->index }}</td>
                            <td>{{ $role->name}}</td>
                            <td>
                                <a href="{{ route('role.permissions', $role->id) }}" class="btn btn-primary btn-sm">Add / Edit role permission</a>
                                @can('update role')
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                @endcan
                                @can('delete role')
                                <a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
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
    const rolesUrl = "{{ route('role.list') }}";
</script>
