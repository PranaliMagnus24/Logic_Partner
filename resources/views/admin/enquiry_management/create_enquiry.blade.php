@extends('admin.layouts.layout')

@section('title', 'Enquiry Management')
@section('admin')
@section('pagetitle', 'Enquiry Management')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Create Enquiry</h4>
                    <a href="{{ route('list.enquiry')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('store.enquiry')}}" method="POST" id="enquiryForm" target="_self" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-2 col-form-label">
                                Assign To Enquiry <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <select name="assign_to[]" id="assign_to" class="form-control select2" multiple>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if(in_array($user->id, old('assign_to', [auth()->id()]))) selected @endif>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('assign_to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Client Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="customer_name" id="name" class="form-control" value="{{ old('customer_name') }}" readonly>
                                @error('customer_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="" class="col-md-4 col-lg-2 col-form-label">Second Client Name</label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="second_customer_name" id="second_name" class="form-control" value="{{ old('customer_name')}}">
                                @error('second_customer_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <select name="project_name" id="project_name" class="form-select">
                                    <option value="">--Select Project Name--</option>
                                    @foreach($properties as $property)
                                    <option value="{{$property->id}}">{{ old('project_name') == $property->id ? 'selected' : '' }} {{$property->project_name}} </option>
                                    @endforeach
                                </select>
                                @error('project_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Location <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="project_location" id="project_location" class="form-control" value="{{ old('project_location')}}">
                                @error('project_location')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Enquiry Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="enquiry_name" id="enquiry_name" class="form-control" value="{{ old('enquiry_name')}}">
                                @error('enquiry_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Stage<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="stage" id="stage" class="form-control" value="{{ old('stage')}}">
                                @error('stage')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <select name="status" id="status" class="form-select">
                                    <option value="">--Select Status--</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Follow up date<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="follow_up_date" id="follow_up_date" class="form-control" value="{{ old('follow_up_date')}}">
                                @error('follow_up_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Follow up time<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="time" name="follow_up_time" id="follow_up_time" class="form-control" value="{{ old('follow_up_time')}}">
                                @error('follow_up_time')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Report Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="report_name" id="report_name" class="form-control" value="{{ old('report_name')}}">
                                @error('report_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Current Stage<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="current_stage_date" id="current_stage_date" class="form-control" value="{{ old('current_stage_date')}}">
                                @error('current_stage_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Created Date<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="created_date" id="created_date" class="form-control" value="{{ old('created_date')}}">
                                @error('created_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Enquiry Type<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                               <select name="enquiry_type" id="enquiry_type" class="form-control">
                                <option value="digital_advertising">Digital Advertising</option>
                                <option value="facebook">Facebook</option>

                               </select>
                                @error('enquiry_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Enquiry Source<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="enquiry_source" id="enquiry_source" class="form-control" value="{{ old('enquiry_source')}}">
                                @error('enquiry_source')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Best time to call<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                              <input type="text" name="best_time_to_call" class="form-control" value="{{ old('best_time_to_call')}}">
                                @error('best_time_to_call')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="" class="col-md-4 col-lg-2 col-form-label">Attachments</label>
                            <div class="col-md-8 col-lg-4">
                              <input type="file" name="attachments" class="form-control">
                                @error('attachments')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <input type="hidden" name="submission_type" id="submission_type" value="">
                        <div class="mb-3 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm me-2" onclick="setSubmissionType('draft')">Save as Draft</button>
                            <button type="submit" class="btn btn-primary btn-sm me-2" onclick="setSubmissionType('final')">Save</button>
                            <button type="button" class="btn btn-primary btn-sm me-2" onclick="submitenquiryPreview()">Preview</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
<script>
    window.appData = {
        csrfToken: "{{ csrf_token() }}",
        enquiryPreviewRoute: "{{ route('enquiry.preview') }}"
    };

</script>
