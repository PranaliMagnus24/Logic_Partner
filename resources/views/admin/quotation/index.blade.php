@extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')
<div class="container">
    <div class="card">
        <div class="card-body mt-5">
            <div class="text-end">
                <a href="{{ route('create.quotation')}}" class="btn btn-success">+</a>
            </div>
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
<script>
    const quotationUrl = "{{ route('list.quotation') }}";
</script>
