
@extends('admin.layouts.layout')

@section('title', 'PDF Export')
@section('admin')
@section('pagetitle', 'PDF Export')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">PDF Export</h4>
                </div>
                <div class="card-body mt-3">

                    <form action="{{ route('pdf.export.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-2 col-form-label">Upload PDF <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                                @error('pdf_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>

                    {{-- Show extracted text if available --}}
                    @if(session('pdf_text'))
                        <div class="card mt-4">
                            <div class="card-header"><strong>Extracted Text from PDF</strong></div>
                            <div class="card-body" style="white-space: pre-wrap;">
                                {{ session('pdf_text') }}
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
