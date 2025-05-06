@extends('admin.layouts.layout')

@section('title', 'Property Management')
@section('admin')
@section('pagetitle', 'Property Management')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Create Property</h4>
                    <a href="{{ route('list.property')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('store.property')}}" method="POST" id="propertyForm" target="_self" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex mb-3" id="borderedTabJustified" role="tablist">
                            <!------------------Property Details----------------->
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="property-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-property" type="button" role="tab" aria-controls="property" aria-selected="true">Property Details</button>
                            </li>
                            <!------------------Prices Details----------------->
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="prices-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-prices" type="button" role="tab" aria-controls="prices" aria-selected="false">Prices Details</button>
                            </li>
                            <!------------------Project Details----------------->
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="project-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-project" type="button" role="tab" aria-controls="project" aria-selected="false">Project Details</button>
                            </li>
                            <!------------------Area Details----------------->
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="area-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-area" type="button" role="tab" aria-controls="area" aria-selected="false">Area Details</button>
                            </li>
                            <!------------------Attachments----------------->
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="attachments-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-attachments" type="button" role="tab" aria-controls="attachments" aria-selected="false">Attachments</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabJustifiedContent">

                            <!-----------------------Property Details---------------->
                            <div class="tab-pane fade show active" id="bordered-justified-property" role="tabpanel" aria-labelledby="property-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Name
                                    </label>
                                    <div class="col-md-8 col-lg-10">
                                        <input type="text" name="property_name" id="property_name" class="form-control" placeholder="property name" value="{{ old('property_name') }}">
                                        @error('property_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Address
                                    </label>
                                    <div class="col-md-8 col-lg-10">
                                        <input type="text" name="property_address" id="property_address" class="form-control" placeholder="property address" value="{{ old('property_address') }}">
                                        @error('property_address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Description</label>
                                    <div class="col-md-8 col-lg-10">
                                        <div id="quill-editor-full" class="mb-3" style="height: 200px;"></div>

                                        <textarea rows="3" class="mb-3 d-none" name="property_description" id="quill-editor-full-area">
                                            {!! old('property_description') !!}
                                        </textarea>

                                        @error('property_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Rooms
                                    </label>
                                    <div class="col-md-8 col-lg-2">
                                        <input type="text" name="available_rooms" id="available_rooms" class="form-control" placeholder="0" value="{{ old('available_rooms') }}">
                                        @error('available_rooms')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Bathrooms
                                    </label>
                                    <div class="col-md-8 col-lg-2">
                                        <input type="text" name="available_bathrooms" id="available_bathrooms" class="form-control" placeholder="0" value="{{ old('available_bathrooms') }}">
                                        @error('available_bathrooms')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Parking
                                    </label>
                                    <div class="col-md-8 col-lg-2">
                                        <input type="text" name="available_parking" id="available_parking" class="form-control" placeholder="0" value="{{ old('available_parking') }}">
                                        @error('available_parking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Type
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="property_type" id="" class="form-select">
                                            <option value="">--Select Property Type--</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}"{{ old('property_type') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('property_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Contract Type</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="contract_type" id="contract_type" class="form-select">
                                            <option value="">--Select Contract Type--</option>
                                            @foreach ($contracts as $contract)
                                            <option value="{{$contract->id}}"{{ old('contract_type') == $contract->id ? 'selected' : '' }}>{{$contract->contract_type_name}}</option>
                                            @endforeach
                                        </select>

                                        @error('contract_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Title Type
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="title_type" placeholder="title type" id="title_type" class="form-control" value="{{ old('title_type') }}">
                                        @error('title_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Titled </label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="titled" id="titled" class="form-select">
                                            <option value="">--Select Titled Type--</option>
                                            <option value="yes" {{ old('titled') == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ old('titled') == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('titled')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Indicative Package</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="indicative_package" id="indicative_package" class="form-select">
                                            <option value="">--Select Indicative Package--</option>
                                            <option value="yes" {{ old('titled') == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ old('titled') == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('indicative_package')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Estimated Date
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="date" name="estimated_date" id="estimated_date" class="form-control" value="{{ old('estimated_date') }}">
                                        @error('estimated_date')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-lg-2 col-form-label">Rent Yield
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="0.00" name="rent_yield" id="rent_yield" value="{{ old('rent_yield') }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('rent_yield')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">SMSF</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="smsf" id="smsf" class="form-control">
                                            <option value="">--Select SMSF--</option>
                                            <option value="yes" {{ old('titled') == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ old('titled') == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('smsf')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Approx Weekly Rent
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="approx_weekly_rent" placeholder="0.00" id="approx_weekly_rent" class="form-control" value="{{ old('approx_weekly_rent') }}">
                                        @error('approx_weekly_rent')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Image
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="property_image[]" id="property_image" class="form-control" multiple>
                                        @error('property_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!------------------Prices Details----------------->
                            <div class="tab-pane fade" id="bordered-justified-prices" role="tabpanel" aria-labelledby="prices-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="property_price" placeholder="$0.00" id="property_price" class="form-control" value="{{ old('property_price') }}">
                                        @error('property_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Vacancy Rate
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="vacancy_rate" placeholder="$0.00" id="vacancy_rate" class="form-control" value="{{ old('vacancy_rate') }}">
                                        @error('vacancy_rate')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-lg-2 col-form-label">Land Area
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="land_area" placeholder="0.00" id="land_area" value="{{ old('land_area') }}">
                                            <span class="input-group-text">sqm</span>
                                        </div>
                                        @error('land_area')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-4 col-lg-2 col-form-label">House Area
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="house_area" id="house_area" placeholder="0.00" value="{{ old('house_area') }}">
                                            <span class="input-group-text">sqm</span>
                                        </div>
                                        @error('house_area')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Design
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="design" id="" class="form-select">
                                            <option value="">--Select Design--</option>
                                            @foreach ($designs as $design)
                                            <option value="{{$design->id}}"{{ old('design') == $design->id ? 'selected' : '' }}>{{$design->design_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('design')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Council Rate
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="council_rate" id="council_rate" class="form-control" placeholder="$0.00" value="{{ old('council_rate') }}">
                                        @error('council_rate')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Land Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="land_price" placeholder="$0.00" id="landPrice" class="form-control" value="{{ old('land_price') }}">
                                        @error('land_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">House Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="house_price" placeholder="$0.00" id="housePrice" class="form-control" value="{{ old('house_price') }}">
                                        @error('house_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Total Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="total_price" placeholder="$0.00" id="totalPrice" class="form-control" value="{{ old('total_price') }}">
                                        @error('total_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Stage
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="stage" placeholder="stage" id="stage" class="form-control" value="{{ old('stage') }}">
                                        @error('stage')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Stamp Duty EST
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="stamp_duty_est" id="stamp_duty_est" class="form-control" placeholder="0.00" value="{{ old('stamp_duty_est') }}">
                                        @error('stamp_duty_est')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Gov. Transfer Fee
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="gov_transfer_fee" id="gov_transfer_fee" class="form-control" placeholder="$0.00" value="{{ old('stamp_duty_est') }}">
                                        @error('gov_transfer_fee')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Owners Corp Fee
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="owners_corp_fee" id="owners_corp_fee" class="form-control" placeholder="$0.00" value="{{ old('owners_corp_fee') }}">
                                        @error('owners_corp_fee')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Status</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="status" id="status" class="form-select">
                                            <option value="">--Select Status--</option>
                                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                            <option value="not-available" {{ old('status') == 'not-available' ? 'selected' : '' }}>Not Available</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!------------------Project Details----------------->
                            <div class="tab-pane fade" id="bordered-justified-project" role="tabpanel" aria-labelledby="project-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="project_name" id="project_name" class="form-control" placeholder="project name" value="{{ old('project_name') }}">
                                        @error('project_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Prices From
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="prices_from" id="prices_from" class="form-control" value="{{ old('prices_from') }}">
                                        @error('prices_from')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Number Available
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="number_available" id="number_available" class="form-control" value="{{ old('number_available') }}">
                                        @error('number_available')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Project Images
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="project_image[]" id="project_image" class="form-control" multiple>
                                        @error('project_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!---------------------------Area Details----------------->
                            <div class="tab-pane fade" id="bordered-justified-area" role="tabpanel" aria-labelledby="area-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Area Name
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="area_name" placeholder="area name" id="area_name" class="form-control" value="{{ old('area_name') }}">
                                        @error('area_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Total Population
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="total_population" id="total_population" class="form-control" value="{{ old('total_population') }}">
                                        @error('total_population')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Distance to CBD
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="distance_to_cbd" id="distance_to_cbd" class="form-control" value="{{ old('distance_to_cbd') }}">
                                        @error('distance_to_cbd')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Area Images
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="area_image[]" id="area_image" class="form-control" multiple>
                                        @error('area_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!--------------Attachments----------------->
                            <div class="tab-pane fade" id="bordered-justified-attachments" role="tabpanel" aria-labelledby="attachments-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Floor Plan Images
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="floor_plan_image[]" id="floor_plan" class="form-control" multiple>
                                        @error('floor_plan_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Feature Images
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="feature_image" id="feature_image" class="form-control">
                                        @error('feature_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Gallery Images
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="gallery_image[]" id="gallery_image" class="form-control" multiple>
                                        @error('gallery_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                        <input type="hidden" name="submission_type" id="submission_type" value="">
                        <div class="mb-3 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm me-2" onclick="setSubmissionType('draft')">Save as Draft</button>
                            <button type="submit" class="btn btn-primary btn-sm me-2" onclick="setSubmissionType('final')">Save</button>
                            <button type="button" class="btn btn-primary btn-sm me-2" onclick="submitpropertyPreview()">Preview</button>
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
        previewRoute: "{{ route('property.preview') }}"
    };
</script>
