
@extends('admin.layouts.layout')
@section('title', 'Property Management')
@section('admin')
@section('pagetitle', 'Property Management')

<div class="container mt-4 print-container">
    <div class="text-end mb-3 no-print">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="{{ route('list.property')}}" class="btn btn-primary">Back</a>
    </div>

    <div class="row g-4">
      <!-- Left Section -->
      <div class="col-md-4">
        <div class="property-card">
            @if($property->propertyImage->count())
            <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                @foreach ($property->propertyImage as $key => $Propertyimage)
                  @if ($Propertyimage->property_image)
                  <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ asset('upload/property_images/' . $Propertyimage->property_image) }}" class="d-block w-100" alt="Project Image" style="height: 250px; object-fit: cover;">
                  </div>
                  @endif
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>
            @endif


          <div class="p-3">
            <h5 class="text-primary">{{$property->project_name}}</h5>
            <span class="badge bg-info text-white">INDICATIVE PACKAGE</span>
            <h4 class="mt-2 text-success">${{ $property->property_price }}</h4>

            <div class="d-flex justify-content-between mt-3">
              <div class="icon-text"><span>🛏️</span>{{ $property->available_rooms }}</div>
              <div class="icon-text"><span>🛁</span>{{ $property->available_bathrooms }}</div>
              <div class="icon-text"><span>🚗</span>{{ $property->available_parking }}</div>
            </div>

            <p class="mt-3 mb-1 fw-semibold">{{ $property->property_address }}</p>
            <p class="mb-1">Stage: {{ $property->stage }} <span class="badge bg-success">{{ $property->property_type}}</span> </p>

          </div>
        </div>
      </div>

      <!-- Right Section -->
       @if(!empty($property->property_address))
      <div class="col-md-8 border rounded bg-white p-4">
        <h5 class="fw-bold mb-3">{{ $property->property_address }}</h5>
        <div class="text-muted">{!! $property->property_description !!}</div>
      </div>
      @endif
    </div>

    <div class="row mt-4">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if($property->propertyImage->count())
                    <div id="propertyCarouselCard" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        @foreach ($property->propertyImage as $key => $image)
                          @if ($image->project_image)
                          <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ asset('upload/project_images/' . $image->project_image) }}" class="d-block w-100" alt="Project Image" style="height: 250px; object-fit: cover;">
                          </div>
                          @endif
                        @endforeach
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarouselCard" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#propertyCarouselCard" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </button>
                    </div>
                    @endif
                    <table class="table table-sm table-bordered mb-2 nowrap">
                        <tr><th>Project Name</th><td>{{ $property->project_name }}</td></tr>
                        <tr><th>Prices From</th><td>${{ number_format($property->price_from) }}</td></tr>
                        <tr><th>Number Available</th><td>{{ $property->number_available }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    @foreach ($property->propertyImage as $image)
              @if ($image->area_image)
                <div class="property-image mt-3">
                  <img src="{{ asset('upload/area_images/' . $image->area_image) }}" alt="Project Image">
                </div>
              @endif
            @endforeach

                    <table class="table table-sm table-bordered mb-2 nowrap">
                        <tr><th>Area Name</th><td>{{ $property->area_name }}</td></tr>
                        <tr><th>Total Population</th><td>{{ $property->total_population }}</td></tr>
                        <tr><th>Distance to CBD</th><td>{{ $property->distance_to_cbd }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-3 mt-3 bg-primary text-white rounded p-2">
                        <h5>Specification</h5>
                    </div>
                    <div class="d-flex justify-content-between mt-2 mb-3">
                        <div class="icon-text"><span>🛏️</span>{{ $property->available_rooms }}</div>
                        <div class="icon-text"><span>🛁</span>{{ $property->available_bathrooms }}</div>
                        <div class="icon-text"><span>🚗</span>{{ $property->available_parking }}</div>
                      </div>
                    <table class="table table-sm table-bordered mb-2 nowrap">
                        <tr><th>Property Id</th><td>{{ $property->property_id }}</td></tr>
                        <tr><th>Property Type</th><td>{{ $property->category->category_name}}</td></tr>
                        <tr><th>Status</th><td>{{ $property->status }}</td></tr>
                        <tr><th>Contract Type</th><td>{{ $property->contract->contract_type_name }}</td></tr>
                        <tr><th>Title Type</th><td>{{ $property->title_type }}</td></tr>
                        <tr><th>Titled</th><td>{{ $property->titled }}</td></tr>
                        <tr><th>Indicative Package</th><td>{{ $property->indicative_package }}</td></tr>
                        <tr><th>Estimated Date</th><td>{{ \Carbon\Carbon::parse($property->estimated_date)->format('d M Y') }}</td></tr>
                        <tr><th>Rent Yield</th><td>{{ $property->rent_yield }} %</td></tr>
                        <tr><th>Approx. Weekly Rent</th><td>${{ $property->approx_weekly_rent }}</td></tr>
                        <tr><th>Land Area</th><td>{{ $property->land_area }} sqm</td></tr>
                        <tr><th>House Area</th><td>{{ $property->house_area }} sqm</td></tr>
                        @if(!empty($property->land_price))
                        <tr><th>Land Price</th><td>${{ $property->land_price }}</td></tr>
                        @endif
                        @if(!empty($property->house_price))
                        <tr><th>House Price</th><td>${{ $property->house_price }}</td></tr>
                        @endif
                        @if(!empty($property->total_price))
                        <tr><th>Total Price</th><td>${{ $property->total_price }}</td></tr>
                        @endif
                        <tr><th>Stage</th><td>{{ $property->stage }}</td></tr>
                        <tr><th>Stamp duty Est.</th><td>${{ $property->stamp_duty_est }}</td></tr>
                        <tr><th>Gov. Transfer Fee</th><td>${{ $property->gov_transfer_fee }}</td></tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

  </div>
@endsection


