@extends('admin.layouts.layout')

@section('title', 'Enquiry Management')
@section('admin')
@section('pagetitle', 'Enquiry Management')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Enquiry</h4>
                    <a href="{{ route('list.enquiry')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('update.enquiry', $enquiry->id)}}" method="POST">
                        @csrf
                            <div class="row mb-3">
                                <label for="assign_to" class="col-md-4 col-lg-3 col-form-label">
                                    Assign To Enquiry <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8 col-lg-6">
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach ($users as $user)
                                        <div class="form-check">
                                            <input type="checkbox" name="assign_to[]" value="{{ $user->id }}"
                                                    id="user_{{ $user->id }}" class="form-check-input"
                                                    @if(in_array($user->id, old('assign_to', $selectedUsers))) checked @endif>
                                                <label for="user_{{ $user->id }}" class="form-check-label">
                                                    {{ $user->name }}
                                                </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @error('assign_to')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="project_name" id="project_name" class="form-control" value="{{ old('project_name', $enquiry->project_name) }}">
                                @error('project_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Location <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="project_location" id="project_location" class="form-control" value="{{ old('project_location', $enquiry->project_location)}}">
                                @error('project_location')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-3 col-form-label">Estimated Budget <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-3">
                                <input type="number" name="estimated_budget" id="estimated_budget" class="form-control" value="{{ old('estimated_budget', $enquiry->estimated_budget)}}">
                                @error('estimated_budget')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="" class="col-md-4 col-lg-3 col-form-label">Estimated Timeline <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-3">
                                <input type="number" name="estimated_timeline" id="estimated_timeline" class="form-control" value="{{ old('estimated_timeline', $enquiry->estimated_timeline)}}">
                                @error('estimated_timeline')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Full Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="customer_name" id="name" class="form-control" value="{{ old('customer_name', $enquiry->customer_name)}}">
                                @error('customer_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="customer_email" id="email" class="form-control" value="{{ old('customer_email', $enquiry->customer_email)}}">
                                @error('customer_email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="customer_phone" id="phone" class="form-control" value="{{ old('customer_phone', $enquiry->customer_phone)}}">
                                @error('customer_phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Address <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <textarea name="customer_address" id="address" cols="10" rows="5" class="form-control">{{ old('customer_address', $enquiry->customer_address) }}</textarea>
                                @error('customer_address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
