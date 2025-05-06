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
                        <a href="{{ route('create.property') }}" class="btn btn-success">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <div class="d-flex mb-3 justify-content-between align-items-center">
                        <div class="actionDropdown"></div>
                    </div>
                    <table class="table table-bordered table-striped propertyList nowrap">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                        <label class="form-check-label" for="selectAll">All</label>
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Property Id</th>
                                <th>Property Type</th>
                                <th>Contract Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div id="compareDisplay" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const propertyUrl = "{{ route('list.property') }}";
    const compareUrl = "{{ route('property.compare') }}";
    const bulkDeleteUrl = "{{ route('property.bulkDelete') }}";
</script>
@endsection
