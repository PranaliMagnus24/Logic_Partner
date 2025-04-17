@extends('admin.layouts.layout')

@section('title', 'Enquiry Management')
@section('admin')
@section('pagetitle', 'Enquiry Management')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Enquiry Management</h4>
                </div>
                <div class="card-body mt-3">
                    <div class="text-end mb-2">
                        <a href="{{ route('create.enquiry')}}" class="btn btn-success">+</a>
                    </div>
                  <table class="table table-bordered table-striped enquiryTable nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Project Location</th>
                            <th>Estimated Budget </th>
                            <th>Estimated Timeline </th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Client Phone</th>
                            <th>Address</th>
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
    const enquiryUrl = "{{ route('list.enquiry') }}";
</script>

