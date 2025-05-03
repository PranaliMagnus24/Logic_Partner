@extends('admin.layouts.layout')

@section('title', 'Property Management')
@section('admin')
@section('pagetitle', 'Property Management')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Property</h4>
                    <a href="{{ route('list.property')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('update.property', $property->id)}}" method="POST" id="propertyForm" target="_self" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="property-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-property" type="button" role="tab" aria-controls="property" aria-selected="true">Property Details</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="project-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-project" type="button" role="tab" aria-controls="project" aria-selected="false">Project Details</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="area-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-area" type="button" role="tab" aria-controls="area" aria-selected="false">Area Details</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                            <!-----------Property Details--------->
                            <div class="tab-pane fade show active" id="bordered-justified-property" role="tabpanel" aria-labelledby="property-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Name
                                    </label>
                                    <div class="col-md-8 col-lg-10">
                                        <input type="text" name="property_name" id="property_name" class="form-control" placeholder="property name" value="{{ old('property_name', $property->property_name) }}">
                                        @error('property_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Property Address
                                    </label>
                                    <div class="col-md-8 col-lg-10">
                                        <input type="text" name="property_address" id="property_address" class="form-control" placeholder="property address" value="{{ old('property_address', $property->property_address) }}">
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
                                            {!! old('property_description', $property->property_description) !!}
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
                                        <input type="text" name="available_rooms" id="available_rooms" class="form-control" placeholder="0" value="{{ old('available_rooms', $property->available_rooms) }}">
                                        @error('available_rooms')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Bathrooms
                                    </label>
                                    <div class="col-md-8 col-lg-2">
                                        <input type="text" name="available_bathrooms" id="available_bathrooms" class="form-control" placeholder="0" value="{{ old('available_bathrooms', $property->available_bathrooms) }}">
                                        @error('available_bathrooms')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Parking
                                    </label>
                                    <div class="col-md-8 col-lg-2">
                                        <input type="text" name="available_parking" id="available_parking" class="form-control" placeholder="0" value="{{ old('available_parking', $property->available_parking) }}">
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
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('property_type', $property->property_type) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('property_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Contract Type</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="contract_type" id="contract_type" class="form-control">
                                            <option value="">--Select Contract Type--</option>
                                            @foreach($contracts as $contract)
                                            <option value="{{ $contract->id}}" {{ old('contract_type', $property->contract_type) == $contract->id ? 'selected' : '' }}>{{$contract->contract_type_name}}</option>
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
                                        <input type="text" name="title_type" id="title_type" class="form-control" value="{{ old('title_type', $property->title_type) }}">
                                        @error('title_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Titled </label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="titled" id="titled" class="form-control">
                                            <option value="">--Select Titled Type--</option>
                                            <option value="yes" {{ old('titled', $property->titled) == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ old('titled', $property->titled) == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('titled')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Indicative Package</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="indicative_package" id="indicative_package" class="form-control">
                                            <option value="">--Select Indicative Package--</option>
                                            <option value="yes" {{ old('indicative_package', $property->indicative_package) == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ old('indicative_package', $property->indicative_package) == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('indicative_package')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Estimated Date
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="date" name="estimated_date" id="estimated_date" class="form-control" value="{{ old('estimated_date', $property->estimated_date) }}">
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
                                            <input type="text" class="form-control" name="rent_yield" id="rent_yield" value="{{ old('rent_yield', $property->rent_yield) }}">
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
                                            <option value="yes" {{ old('smsf', $property->smsf) == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ old('smsf', $property->smsf) == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('smsf')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">ADDM
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="addm" id="addm" class="form-control" value="{{ old('addm', $property->addm) }}">
                                        @error('addm')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Approx Weekly Rent
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="approx_weekly_rent" id="approx_weekly_rent" class="form-control" value="{{ old('approx_weekly_rent', $property->approx_weekly_rent) }}">
                                        @error('approx_weekly_rent')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Vacancy Rate
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="vacancy_rate" id="vacancy_rate" class="form-control" value="{{ old('vacancy_rate', $property->vacancy_rate) }}">
                                        @error('vacancy_rate')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label class="col-sm-4 col-lg-2 col-form-label">Land Area
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="land_area" id="land_area" value="{{ old('land_area', $property->land_area) }}">
                                            <span class="input-group-text">sqm</span>
                                        </div>
                                        @error('land_area')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-lg-2 col-form-label">House Area
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="house_area" id="house_area" value="{{ old('house_area', $property->house_area) }}">
                                            <span class="input-group-text">sqm</span>
                                        </div>
                                        @error('house_area')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Design
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="design" id="design" class="form-control" value="{{ old('design', $property->design) }}">
                                        @error('design')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Land Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="land_price" id="landPrice" class="form-control" value="{{ old('land_price', $property->land_price) }}">
                                        @error('land_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">House Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="house_price" id="housePrice" class="form-control" value="{{ old('house_price', $property->house_price) }}">
                                        @error('house_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Total Price
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="total_price" id="totalPrice" class="form-control" value="{{ old('total_price', $property->total_price) }}">
                                        @error('total_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Stage
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="stage" id="stage" class="form-control" value="{{ old('stage', $property->stage) }}">
                                        @error('stage')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Stamp Duty EST
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="stamp_duty_est" id="stamp_duty_est" class="form-control" value="{{ old('stamp_duty_est', $property->stamp_duty_est) }}">
                                        @error('stamp_duty_est')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Gov. Transfer Fee
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="gov_transfer_fee" id="gov_transfer_fee" class="form-control" value="{{ old('gov_transfer_fee', $property->gov_transfer_fee) }}">
                                        @error('gov_transfer_fee')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Owners Corp Fee
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="owners_corp_fee" id="owners_corp_fee" class="form-control" value="{{ old('owners_corp_fee', $property->owners_corp_fee) }}">
                                        @error('owners_corp_fee')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Status</label>
                                    <div class="col-md-8 col-lg-4">
                                        <select name="status" id="status" class="form-control">
                                            <option value="">--Select Status--</option>
                                            <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Available</option>
                                            <option value="not-available" {{ old('status', $property->status) == 'not-available' ? 'selected' : '' }}>Not Available</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Council Rate
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="council_rate" id="council_rate" class="form-control" value="{{ old('council_rate', $property->council_rate) }}">
                                        @error('council_rate')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--------------------Property Details------------->
                            <div class="tab-pane fade" id="bordered-justified-project" role="tabpanel" aria-labelledby="project-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="project_name" id="project_name" class="form-control" value="{{ old('project_name', $property->project_name) }}">
                                        @error('project_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Prices From
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="prices_from" id="prices_from" class="form-control" value="{{ old('prices_from', $property->prices_from) }}">
                                        @error('prices_from')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Number Available
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="number_available" id="number_available" class="form-control" value="{{ old('number_available', $property->number_available) }}">
                                        @error('number_available')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Project Images
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="project_image[]" id="project_image" class="form-control" multiple>
                                        @if($property->propertyImage->whereNotNull('project_image')->count())
                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-10 d-flex flex-wrap">
                                                @foreach($property->propertyImage->whereNotNull('project_image') as $image)
                                                <div class="me-2 mb-2">
                                                    <img src="{{ asset('upload/project_images/' . $image->project_image) }}" width="100" class="img-thumbnail">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @error('project_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--------------------Area Details---------------->
                            <div class="tab-pane fade" id="bordered-justified-area" role="tabpanel" aria-labelledby="area-tab">
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Area Name
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="area_name" id="area_name" class="form-control" value="{{ old('area_name', $property->area_name) }}">
                                        @error('area_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Total Population
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="total_population" id="total_population" class="form-control" value="{{ old('total_population', $property->total_population) }}">
                                        @error('total_population')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Distance to CBD
                                    </label>
                                    <div class="col-md-8 col-lg-4">
                                        <input type="text" name="distance_to_cbd" id="distance_to_cbd" class="form-control" value="{{ old('distance_to_cbd', $property->distance_to_cbd) }}">
                                        @error('distance_to_cbd')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-md-4 col-lg-2 col-form-label">Area Images
                                    </label>
                                    {{-- Area Images --}}
                                    <div class="col-md-8 col-lg-4">
                                        <input type="file" name="area_image[]" id="area_image" class="form-control" multiple>
                                        @if($property->propertyImage->whereNotNull('area_image')->count())
                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-10 d-flex flex-wrap">
                                                @foreach($property->propertyImage->whereNotNull('area_image') as $image)
                                                <div class="me-2 mb-2">
                                                    <img src="{{ asset('upload/area_images/' . $image->area_image) }}" width="100" class="img-thumbnail">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @error('area_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm me-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
