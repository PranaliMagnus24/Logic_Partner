{{-- @extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Quotation</h4>
                    <a href="{{ route('list.quotation')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('update.quotation', $quotation->id)}}" method="POST" id="quotationForm" enctype="multipart/form-data" target="_self">
                        @csrf
                        <input type="hidden" name="enquiry_id" value="{{ $enquiryId }}">
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="project_name" class="form-control" value="{{ $quotation->project_name }}" readonly>
                                @error('project_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Location <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="project_location" class="form-control" value="{{$quotation->project_location}}" readonly>
                                @error('project_location')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Build Up Area <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="build_up_area" class="form-control" value="{{ old('build_up_area', $quotation->build_up_area) }}">
                                @error('build_up_area')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Number of Floors <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="num_floors" class="form-control" value="{{ old('num_floors', $quotation->num_floors)}}">
                                @error('num_floors')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Labor Cost <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="labor_cost" class="form-control" value="{{ old('labor_cost', $quotation->labor_cost)}}">
                                @error('labor_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Material Cost <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="material_cost" class="form-control" value="{{ old('material_cost', $quotation->material_cost)}}">
                                @error('material_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Equipment Cost <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="equipment_cost" class="form-control" value="{{ old('equipment_cost', $quotation->equipment_cost)}}">
                                @error('equipment_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Miscellaneous Expenses <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="misc_expenses" class="form-control" value="{{ old('misc_expenses', $quotation->misc_expenses)}}">
                                @error('misc_expenses')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="extraCostsContainer"></div>
                        <div class="mb-3 text-end">
                            <button type="button" class="btn btn-secondary" id="addExtraCost">Add New Row</button>
                        </div><!--  extra costs -->
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Total Cost <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="total_cost" class="form-control" value="{{ old('total_cost', $quotation->total_cost)}}">
                                @error('total_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Start Date <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $quotation->start_date)}}">
                                @error('start_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Completion Date <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="completion_date" class="form-control" value="{{ old('completion_date', $quotation->completion_date)}}">
                                @error('completion_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <select name="status" class="form-select">
                                    <option value="active" {{ old('status', $quotation->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status', $quotation->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Attachment</label>
                            <div class="col-md-8 col-lg-4">
                                <input type="file" name="attached_documents" class="form-control">
                                <span class="text-dark">Note: The file accepts only PDF, PPT, and DOC formats.</span>
                                @error('attached_documents')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                @if (!empty($quotation->attached_documents))
                                    <div class="mt-2">
                                        <strong>Uploaded File:</strong>
                                        <a href="{{ asset('upload/attachements/' . $quotation->attached_documents) }}" target="_blank">
                                            view file
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm me-2">Update</button>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="submitPreview()">Preview</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection --}}


@extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Quotation</h4>
                    <a href="{{ route('list.quotation') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('update.quotation', $quotation->id)}}" method="POST" enctype="multipart/form-data" id="quotationForm" target="_self">
                        @csrf
                        <div class="row">
                            <!-- Left Column: Tabs inside a card -->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Sections</h6>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                                            <button class="nav-link active" id="v-pills-details-tab" data-bs-toggle="pill" data-bs-target="#v-pills-details" type="button" role="tab">Property Details</button>
                                            <button class="nav-link" id="v-pills-funding-tab" data-bs-toggle="pill" data-bs-target="#v-pills-funding" type="button" role="tab">Funding & Performance</button>
                                            <button class="nav-link" id="v-pills-purchase-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purchase" type="button" role="tab">Purchase Estimates</button>
                                            <button class="nav-link" id="v-pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#v-pills-timeline" type="button" role="tab">Timeline Dates</button>
                                            <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab">Payment Milestones</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Tab Content (All in ONE form) -->
                            <div class="col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Property Details -->
                                    <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel">
                                        <div class="card mb-3">
                                            <div class="card-header"><strong>Property Details</strong></div>
                                            <div class="card-body mt-3">
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">PIFA Report Name <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="enquiry_id" id="" class="form-control">
                                                            @foreach ($enquiries as $enquiry)
                                                            <option value="{{ $enquiry->id }}" {{ (old('enquiry_id', $quotation->enquiry_id) == $enquiry->id) ? 'selected' : '' }}>
                                                                {{ $enquiry->report_name }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                        @error('enquiry_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Summary<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <textarea name="summary" id="" class="form-control" rows="5" placeholder="summary">{{old('summary', $quotation->summary)}}</textarea>
                                                      @error('summary')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Property<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                     <input type="text" class="form-control" name="property" value="{{ old('property', $quotation->property)}}">
                                                     @error('property')
                                                     <span class="text-danger">{{$message}}</span>
                                                     @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Contract Type<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                     <select name="contract_type" id="" class="form-control">
                                                        <option value="two_part_contract"  {{ (old('contract_type', $quotation->contract_type) == 'two_part_contract') ? 'selected' : '' }}>2 Part Contract</option>
                                                     </select>
                                                     @error('contract_type')
                                                     <span class="text-danger">{{$message}}</span>
                                                     @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Land Purchase Cost<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                     <input type="text" class="form-control land-purchase-cost" name="land_purchase_cost" id="land-purchase-cost" value="{{old('land_purchase_cost', $quotation->land_purchase_cost)}}">
                                                     @error('land_purchase_cost')
                                                     <span class="text-danger">{{$message}}</span>
                                                     @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Building Cost<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control building-cost" name="building_cost" id="building-cost" value="{{ old('building_cost', $quotation->building_cost)}}">
                                                      @error('building_cost')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Purchase price<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                     <input type="text" class="form-control purchase-price" name="purchase_price" id="purchase-price" value="{{ old('purchase_price', $quotation->purchase_price)}}" readonly>
                                                     @error('purchase_price')
                                                     <span class="text-danger">{{$message}}</span>
                                                     @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">EOI Deposite land<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="eoi_deposite_land" value="{{ old('eoi_deposite_land', $quotation->eoi_deposite_land)}}">
                                                      @error('eoi_deposite_land')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">EOI Deposite Build<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="eoi_deposite_build" value="{{ old('eoi_deposite_build', $quotation->eoi_deposite_build)}}">
                                                      @error('eoi_deposite_build')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Land Deposite<span class="text-danger">*</span></label>
                                                    <div class="col-sm-4">
                                                      <input type="text" class="form-control land-deposite-percent" name="land_deposite_percent" placeholder="%" id="land-deposite-percent" value="{{ old('land_deposite_percent', $quotation->land_deposite_percent)}}">
                                                      @error('land_deposite_percent')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control land-deposite-price" name="land_deposite_price" id="land-deposite-price" value="{{ old('land_deposite_price', $quotation->land_deposite_price)}}">
                                                        @error('land_deposite_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                      </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Building Deposite<span class="text-danger">*</span></label>
                                                    <div class="col-sm-4">
                                                      <input type="text" class="form-control building-deposite-percent" name="building_deposite_percent" placeholder="%" id="building-deposite-percent" value="{{ old('building_deposite_percent', $quotation->building_deposite_percent)}}">
                                                      @error('building_deposite_percent')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control building-deposite-price" name="building_deposite_price" id="building-deposite-price" value="{{ old('building_deposite_price', $quotation->building_deposite_price)}}">
                                                        @error('building_deposite_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                      </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Funding -->
                                    <div class="tab-pane fade" id="v-pills-funding" role="tabpanel">
                                        <div class="card mb-3">
                                            <div class="card-header"><strong>Funding & Performance</strong></div>
                                            <div class="card-body mt-3">
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Cash Deposite $<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="cash_deposite" value="{{ old('cash_deposite', $quotation->cash_deposite)}}">
                                                      @error('cash_deposite')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Bank Interest Rate<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="bank_interest_rate" class="form-control" value="{{ old('bank_interest_rate', $quotation->bank_interest_rate)}}" readonly>
                                                        @error('bank_interest_rate')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Contigency allowance as % of the purchase price<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="contigency_purchase_price" value="{{ old('contigency_purchase_price', $quotation->contigency_purchase_price)}}">
                                                      @error('contigency_purchase_price')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Capital Growth PA<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="capital_growth_pa" value="{{ old('capital_growth_pa', $quotation->capital_growth_pa)}}">
                                                      @error('capital_growth_pa')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Purchase -->
                                    <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel">
                                        <div class="card mb-3">
                                            <div class="card-header"><strong>Purchase Expense Estimates</strong></div>
                                            <div class="card-body mt-3">
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">State<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="state" id="state-select" class="form-control">
                                                            <option value="">-- Select State --</option>
                                                            @foreach($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ old('state', $quotation->state) == $state->id ? 'selected' : '' }}>
                                                                    {{ $state->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('state')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Stamp Duty<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="stamp_duty" class="form-control" value="{{ old('stamp_duty', $quotation->stamp_duty)}}">
                                                        @error('stamp_duty')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Trans<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="trans" class="form-control" value="{{ old('trans', $quotation->trans)}}">
                                                        @error('trans')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Solicitor Price<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="soliditor_price" class="form-control" value="{{ old('soliditor_price', $quotation->soliditor_price)}}">
                                                        @error('soliditor_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Misc Purchase Cost<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="misc_purchase_cost" class="form-control" value="{{ old('misc_purchase_cost', $quotation->misc_purchase_cost)}}">
                                                        @error('misc_purchase_cost')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="text-end mt-2">
                                                    <input type="button" class="btn btn-primary" onclick="addTime()" value="Add More" />
                                                </div>
                                                <div id="add-more-container" class="mt-3">
                                                    @if (!empty($quotation->other_one_label) && is_array($quotation->other_one_label))
                                                    @foreach ($quotation->other_one_label as $index => $label)
                                                    <div class="mb-3 row align-items-center add-more mt-1">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="other_one_label[]" value="{{ $label }}" placeholder="Other">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="other_one_input[]" class="form-control"
                                                                value="{{ $quotation->other_one_input[$index] ?? '' }}" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                @endforeach

                                                    @else
                                                        {{-- Default one field --}}
                                                        <div class="mb-3 row align-items-center add-more mt-1">
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="other_one_label[]" value="" placeholder="Other">
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="other_one_input[]" class="form-control" value="" placeholder="0.00">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <!-- Timeline -->
                                    <div class="tab-pane fade" id="v-pills-timeline" role="tabpanel">
                                        <div class="card mb-3">
                                            <div class="card-header"><strong>Timeline Key Dates</strong></div>
                                            <div class="card-body mt-3">
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">EOI Dates<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="eoi_date" class="form-control" value="{{ old('eoi_date', $quotation->eoi_date)}}">
                                                        @error('eoi_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Unconditional days estimates<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="unconditional_days" class="form-control" value="{{ old('unconditional_days', $quotation->unconditional_days)}}">
                                                        @error('unconditional_days')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Titles<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="titles" id="" class="form-control">
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                        @error('titles')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Estimates Titled Date<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="estimate_titled_date" class="form-control" value="{{ old('estimate_titled_date', $quotation->estimate_titled_date)}}">
                                                        @error('estimate_titled_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Settlement Days<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="settlement_days" class="form-control" value="{{ old('settlement_days', $quotation->settlement_days)}}">
                                                        @error('settlement_days')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Estimate Settlement Date<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="estimate_settlement_date" class="form-control" value="{{ old('estimate_settlement_date', $quotation->estimate_settlement_date)}}">
                                                        @error('estimate_settlement_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Site Start(weeks)<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="site_start_week" class="form-control" value="{{ old('site_start_week', $quotation->site_start_week)}}">
                                                        @error('site_start_week')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Handover(Amount Due)<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="handover_amount" class="form-control" value="{{ old('handover_amount', $quotation->handover_amount)}}">
                                                        @error('handover_amount')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Handover(Days)<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="handover_days" class="form-control" value="{{ old('handover_days', $quotation->handover_days)}}">
                                                        @error('handover_days')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Total Time(months)<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="total_time_month" class="form-control" value="{{ old('total_time_month', $quotation->total_time_month)}}">
                                                        @error('total_time_month')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment -->
                                    <div class="tab-pane fade" id="v-pills-payment" role="tabpanel">
                                        <div class="card mb-3">
                                            <div class="card-header"><strong>Payment Milestones</strong></div>
                                            <div class="card-body mt-3">
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Template<span class="text-danger">*</span></label>
                                                    <div class="col-sm-6">
                                                        <select name="payment_template" id="" class="form-control">
                                                            <option value="WA" {{ (old('payment_template', $quotation->payment_template) == 'payment_template') ? 'selected' : '' }}>WA</option>

                                                        </select>
                                                        @error('payment_template')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-2">
                                                       <button class="btn btn-secondary">Re-Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              Override
                                            </label>
                                          </div>
                                          <div class="card mb-3">
                                            <div class="card-body mt-3">
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Template Name</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="template_name" value="{{$quotation->template_name}}">
                                                        @error('template_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Construction(Calendar days)</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="construction_days" value="{{$quotation->construction_days}}">
                                                        @error('construction_days')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">State</label>
                                                    <div class="col-sm-6">
                                                        <select name="template_state" id="" class="form-control">
                                                            @foreach ($states as $state)
                                                              <option value="{{$state->id}}">{{$state->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('template_state')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">EOI Deposite Land</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="template_eoi_deposite_land" value="{{$quotation->template_eoi_deposite_land}}">
                                                        @error('template_eoi_deposite_land')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">EOI Deposite Build</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="template_eoi_deposite_build" value="{{$quotation->template_eoi_deposite_build}}">
                                                        @error('template_eoi_deposite_build')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Land Deposite</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="template_land_deposite_percent" value="{{$quotation->template_land_deposite_percent}}">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        @error('template_land_deposite_percent')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Building Deposite</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="template_building_deposite_percent" value="{{$quotation->template_building_deposite_percent}}">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        @error('template_building_deposite_percent')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Builder</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="template_builder" value="{{$quotation->template_builder}}">
                                                        @error('template_builder')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
<!--------------Table------------>
<div class="card mb-3">
    <div class="card-body">
        <table class="table table-bordered align-middle text-center mt-3" id="paymentTable">
            <thead class="table-light">
                <tr>
                    <th style="width: 10%">Actions</th>
                    <th>Label</th>
                    <th style="width: 15%">%</th>
                    <th>Status Payable</th>
                </tr>
            </thead>
            <tbody>
                @forelse($paymentTables as $payment)
                    <tr>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-light move-up"><i class="bi bi-arrow-up"></i></button>
                                <button type="button" class="btn btn-sm btn-light move-down"><i class="bi bi-arrow-down"></i></button>
                                <button type="button" class="btn btn-sm btn-danger delete-row"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                        <td><input type="text" name="labels[]" class="form-control" value="{{ $payment->labels }}"></td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="percentages[]" class="form-control" value="{{ $payment->percentages }}">
                                <span class="input-group-text">%</span>
                            </div>
                        </td>
                        <td>
                            <select name="statuses[]" class="form-control">
                                @php
                                    $statuses = [
                                        "reserved", "unconditional contract", "build deposite paid",
                                        "settlement land", "base payment paid", "frame payment paid",
                                        "roof payment paid", "enclosed payment paid", "practical completion"
                                    ];
                                @endphp
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}" {{ $payment->statuses === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @empty
                    <!-- Fallback: Render 1 empty row if no data -->
                    <tr>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-light move-up"><i class="bi bi-arrow-up"></i></button>
                                <button type="button" class="btn btn-sm btn-light move-down"><i class="bi bi-arrow-down"></i></button>
                                <button type="button" class="btn btn-sm btn-danger delete-row"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                        <td><input type="text" name="labels[]" class="form-control"></td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="percentages[]" class="form-control">
                                <span class="input-group-text">%</span>
                            </div>
                        </td>
                        <td>
                            <select name="statuses[]" class="form-control">
                                <option value="reserved">reserved</option>
                                <option value="unconditional contract">unconditional contract</option>
                                <option value="build deposite paid">build deposite paid</option>
                                <option value="settlement land">settlement land</option>
                                <option value="base payment paid">base payment paid</option>
                                <option value="frame payment paid">frame payment paid</option>
                                <option value="roof payment paid">roof payment paid</option>
                                <option value="enclosed payment paid">enclosed payment paid</option>
                                <option value="practical completion">practical completion</option>
                            </select>
                        </td>
                    </tr>
                @endforelse
                </tbody>

        </table>

        <!-- Add Row Button -->
        <div class="text-end">
            <button type="button" class="btn btn-primary btn-sm" id="addRowBtn">
                <i class="bi bi-plus-lg"></i>
            </button>
        </div>
    </div>
</div>
<!----------Table end-------->


                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <input type="hidden" name="submission_type" id="submission_type" value="">
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm me-2">Update</button>
                                    <button type="submit" class="btn btn-primary btn-sm me-2" onclick="submitPreview()">Preview</button>
                                    <button type="button" class="btn btn-primary btn-sm me-2" onclick="generatePDF({{ $quotation->id }})">Generate PDF</button>
                                </div>
                            </div>
                        </div> <!-- .row -->
                    </form>
                </div> <!-- .card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    window.quotationPreviewRoute = "{{ route('quotation.preview') }}";
    window.csrfToken = "{{ csrf_token() }}";

    function generatePDF(id) {
    window.open(`/generate-pdf/${id}`, '_blank');
}

</script>

