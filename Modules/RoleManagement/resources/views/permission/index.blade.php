@extends('admin.layouts.layout')

@section('title', 'Permissions')
@section('admin')
@section('pagetitle', 'Permission')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Permission</h4>
                </div>
                <div class="card-body mt-3">
                    <div class="text-end mb-2">
                        <a href="{{ route('permission.create') }}" class="btn btn-primary mb-3">+</a>
                    </div>
                    {{-- @livewire('permission-table') --}}
                  <table class="table table-bordered table-striped permissionList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permissions->firstItem() + $loop->index }}</td>
                            <td>{{ $permission->name}}</td>
                            <td>
                                @can('update permission')
                              <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                              @endcan
                              @can('delete permission')
                              <a href="{{ route('permission.delete', $permission->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
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
    const permissionUrl = "{{ route('permission.list') }}";
</script>
