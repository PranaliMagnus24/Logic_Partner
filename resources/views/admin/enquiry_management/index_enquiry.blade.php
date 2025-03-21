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
                    <div class="d-flex align-items-center">
                        <form class="d-flex me-2" method="GET" action="{{ route('list.enquiry')}}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary" title="Search">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                        @can('create enquiry')
                        <a href="{{ route('create.enquiry') }}" class="btn btn-primary mb-3">+</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body mt-3">
                    {{-- @livewire('permission-table') --}}
                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $enquiry)
                        <tr>
                            <td>{{ $enquiries->firstItem() + $loop->index }}</td>
                            <td>{{ $enquiry->project_name}}</td>
                            <td>{{ $enquiry->customer_name}}</td>
                            <td>{{ $enquiry->customer_email}}</td>
                            <td>{{ $enquiry->customer_phone}}</td>
                           <td>
                                @can('update enquiry')
                              <a href="{{ route('edit.enquiry', $enquiry->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                              @endcan
                              @can('delete enquiry')
                              <a href="{{ route('delete.enquiry', $enquiry->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                              @endcan
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                  </table>
                <div class="d-flex justify-content-center">
               {{$enquiries->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
