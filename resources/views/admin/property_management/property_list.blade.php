@extends('admin.layouts.layout')

@section('title', 'Property Management')
@section('admin')
@section('pagetitle', 'Property Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Property Management</h4>
                    <div class="text-end mb-2">
                        <a href="{{ route('create.property')}}" class="btn btn-success">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped propertyList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Property Id</th>
                            <th>Property Type</th>
                            <th>Contract Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    const propertyUrl = "{{ route('list.property') }}";
</script>
