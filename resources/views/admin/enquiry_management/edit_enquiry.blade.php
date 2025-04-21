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
                    <form action="{{ route('update.enquiry', $enquiry->id)}}" method="POST" id="enquiryForm" target="_self" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-2 col-form-label">
                                Assign To Enquiry <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-6">
                                <select name="assign_to[]" id="assign_to" class="form-control select2" multiple required>
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
                                <input type="text" name="customer_name" id="name" class="form-control" value="{{ old('customer_name', auth()->user()->name ?? '') }}" readonly>
                                @error('customer_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="" class="col-md-4 col-lg-2 col-form-label">Second Client Name</label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="second_customer_name" id="second_name" class="form-control" value="{{ old('customer_name', $enquiry->second_customer_name)}}">
                                @error('second_customer_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="project_name" id="project_name" class="form-control" value="{{ old('project_name', $enquiry->project_name)}}">
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
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Estimated Budget<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="estimated_budget" id="estimated_budget" class="form-control" value="{{ old('estimated_budget', $enquiry->estimated_budget)}}">
                                @error('estimated_budget')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Estimated Time <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="estimated_timeline" id="estimated_timeline" class="form-control" value="{{ old('estimated_timeline', $enquiry->estimated_timeline)}}">
                                @error('estimated_timeline')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Enquiry Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="enquiry_name" id="enquiry_name" class="form-control" value="{{ old('enquiry_name', $enquiry->enquiry_name)}}">
                                @error('enquiry_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Stage<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="stage" id="stage" class="form-control" value="{{ old('stage',$enquiry->stage)}}">
                                @error('stage')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <select name="status" id="status" class="form-select">
                                    <option value="">--Select Status--</option>
                                    <option value="active" {{ old('status',$enquiry->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status',$enquiry->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Follow up date<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="follow_up_date" id="follow_up_date" class="form-control" value="{{ old('follow_up_date', $enquiry->follow_up_date)}}">
                                @error('follow_up_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Follow up time<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="time" name="follow_up_time" id="follow_up_time" class="form-control" value="{{ old('follow_up_time', $enquiry->follow_up_time)}}">
                                @error('follow_up_time')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Report Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-10">
                                <input type="text" name="report_name" id="report_name" class="form-control" value="{{ old('report_name', $enquiry->report_name)}}">
                                @error('report_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Current Stage<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="current_stage_date" id="current_stage_date" class="form-control" value="{{ old('current_stage_date', $enquiry->current_stage_date)}}">
                                @error('current_stage_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Created Date<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="created_date" id="created_date" class="form-control" value="{{ old('created_date', $enquiry->created_date)}}">
                                @error('created_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Enquiry Type<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                               <select name="enquiry_type" id="enquiry_type" class="form-control">
                                <option value="digital_advertising {{ old('enquiry_type',$enquiry->enquiry_type) == 'digital_advertising' ? 'selected' : '' }}">Digital Advertising</option>
                                <option value="facebook {{ old('enquiry_type',$enquiry->enquiry_type) == 'facebook' ? 'selected' : '' }}">Facebook</option>

                               </select>
                                @error('enquiry_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Enquiry Source<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="enquiry_source" id="enquiry_source" class="form-control" value="{{ old('enquiry_source', $enquiry->enquiry_source)}}">
                                @error('enquiry_source')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Best time to call<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                              <input type="text" name="best_time_to_call" class="form-control" value="{{ old('best_time_to_call', $enquiry->best_time_to_call)}}">
                                @error('best_time_to_call')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="" class="col-md-4 col-lg-2 col-form-label">Attachments</label>
                            <div class="col-md-8 col-lg-4">
                                <input type="file" name="attachments" class="form-control">

                                {{-- Show the existing attachment --}}
                                @if(!empty($enquiry->attachments))
                                    <div class="mt-2">
                                        <strong>Uploaded File:</strong>
                                        <br>
                                        @php
                                            $ext = pathinfo($enquiry->attachments, PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array($ext, ['jpg', 'jpeg', 'png']))
                                            <img src="{{ asset('upload/attachments/' . $enquiry->attachments) }}" alt="Attachment" class="img-thumbnail mt-1" style="max-width: 150px;">
                                        @elseif($ext === 'pdf')
                                            <a href="{{ asset('upload/attachments/' . $enquiry->attachments) }}" target="_blank" class="btn btn-sm btn-primary mt-1">View PDF</a>
                                        @else
                                            <a href="{{ asset('upload/attachments/' . $enquiry->attachments) }}" target="_blank" class="btn btn-sm btn-secondary mt-1">Download File</a>
                                        @endif
                                    </div>
                                @endif

                                @error('attachments')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 text-center">
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary btn-sm me-2">Update</button>
                                <button type="button" class="btn btn-primary btn-sm me-2" onclick="submitPreview()">Preview</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
<script>
        function submitPreview() {
    const form = document.getElementById('enquiryForm');

    const previewForm = document.createElement('form');
    previewForm.action = "{{ route('enquiry.preview') }}";
    previewForm.method = 'POST';
    previewForm.target = '_blank';

    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = "{{ csrf_token() }}";
    previewForm.appendChild(csrfInput);

    // Copy form values into the new form
    const formData = new FormData(form);
    for (let [name, value] of formData.entries()) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        previewForm.appendChild(input);
    }

    document.body.appendChild(previewForm);
    previewForm.submit();
    document.body.removeChild(previewForm);
}
</script>
