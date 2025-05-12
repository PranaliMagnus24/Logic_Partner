
@extends('admin.layouts.layout')
@section('title', 'Property Management')
@section('admin')
@section('pagetitle', 'Property Management')
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .header-top {
      font-size: 0.8rem;
      text-align: right;
      padding-top: 10px;
    }
    .blue-bar {
      background-color: #00a3e0;
      color: white;
      padding: 10px 20px;
    }
    .section-title {
      background-color: #f2f2f2;
      padding: 15px;
      font-weight: bold;
      text-align: center;
    }
    .property-image {
      width: 100%;
      border: 1px solid #ccc;
      margin-bottom: 20px;
    }
    .price-box {
      background-color: #eaf4fc;
      padding: 15px;
    }
    .price-box h5 {
      color: #00a3e0;
    }
    .footer {
      font-size: 0.8rem;
      color: #777;
      padding-top: 20px;
      border-top: 1px solid #ddd;
    }
    .top-bar {
      padding: 15px 0;
      border-bottom: 1px solid #ccc;
    }
    .header-text {
      font-size: 0.9rem;
      text-align: right;
    }
    .overview-banner {
      background-color: #00a3e0;
      color: white;
      padding: 12px 189px;
      display: inline-block;
      position: relative;
      z-index: 10;
      border-radius: 2px;
    }
    .qr-code {
      height: 70px;
      margin-left: 66px;
    }
    .main-heading {
      background-color: #003f59;
      color: white;
      padding-top: 50px;
      padding-bottom: 20px;
      margin-top: -25px;
      position: relative;
      z-index: 1;
    }
    .main-heading h4 {
      font-weight: 600;
    }
    .main-heading small {
      font-size: 0.85rem;
      color: #ccc;
    }
     .card-header {
      background-color: #00aee6;
      color: white;
      font-weight: bold;
    }
    .list-group-item a {
      text-decoration: none;
      color: #00aee6;
    }
    .list-group-item a:hover {
      text-decoration: underline;
    }

    .btn-custom {
      background-color: #00aee6;
      color: white;
    }

     .property-info {
      background-color: #f7f7f7;
    }
    .property-row:nth-child(even) {
      background-color: #e9ecef;
    }
    .property-row {
      padding: 0.5rem 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.95rem;
    }
    .property-label {
      color: #555;
    }
    .property-value {
      font-weight: 600;
      color: #333;
    }
    .table thead th {
      background-color:  #e9ecef;
      color: #333;
      text-align: center;
    }
    .table tbody td,
    .table thead th {
      vertical-align: middle;
      text-align: center;
    }
    .table th[colspan] {
      background-color: #0c3f57;
      color: #fff;
      font-weight: bold;
    }
    .highlight {
      font-weight: bold;
      color: #333;
    }
    .header1 {
      text-align: center;
      padding: 30px 20px 10px;
    }
    .logo1 {
      height: 94px;
    }
.title-bar {
      background-color: #00a6e5;
      color: white;
      text-align: center;
      padding: 33px 161px;
      font-size: 22px;
      font-weight: bold;
      display: inline-block;
      position: relative;
      z-index: 10;
      border-radius: 2px;
      margin-bottom: -32px;
    }
    .prepared-for {
      background-color: #002f4c;
      color: white;
      text-align: center;
      padding: 38px;
      font-size: 16px;
    }
    .pdf-footer{
        background-color: #002f4c;
        color: white;
         text-align: center;
      padding: 10px;
      font-size: 16px;
    }
    .prepared-for .date {
      font-size: 14px;
      margin-top: 5px;
    }
    .main-image {
      width: 100%;
      display: block;
      margin: 0 auto;
    }
    .footer1 {
      text-align: center;
      padding: 20px 30px;
      font-size: 12px;
      color: #555;
    }
    .creator-name {
      font-weight: bold;
      color: #00a6e5;
    }
    .logos {
      margin-top: 10px;
    }
    .logos img {
      height: 42px;
      margin: 12px 5px;
    }
  </style>
</head>
<body>
    <div class="container border p-4 my-5 shadow print-container">
         <div class="text-end mb-3 no-print">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="{{ route('list.property')}}" class="btn btn-primary">Back</a>
    </div>
        <!---------------------Fist Page--------------------->
        <div class="pdf-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="header1">
                        <img src="{{ asset('admin/assets/img/aspire logo.png') }}" alt="Aspire Logo" class="logo1">
                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: 36px;">
                <div class="title-bar d-inline-flex align-items-center justify-content-center">
                    <span class="me-2 fs-1">PROPERTY OVERVIEW</span>
                </div>
            </div>
            <div class="prepared-for">PREPARED FOR <br> <h1>MR FRED & MRS MARY SMITH</h1>
                <span class="date">Date: 04/05/2021</span>
            </div>
            <div class="property-img">
                <img src="{{ asset('admin/assets/img/property.png') }}" alt="Property Image" class="main-image">
            </div>
            <div class="footer1">
                <div class="text-center">
                    <h5>CREATED BY</h5>
                </div>
                <div class="text-center creator-name">
                    <h3>Richard Crabb</h3>
                </div>
                <div class="text-center">
                    <h5 class="text-info">ASPIRE PROPERTY ADVISOR NETWORK</h5>
                </div>
                <div class="text-center">
                    <h5>Managing Director</h5>
                </div>
                <div class="text-center">
                    <p> QPIA® - Qualified Property Investment Advisor | Dip Financial Planning | LREA: VIC: 082760L - SA: RLA 292544 - QLD: 3579879 | PIPA Board Member</p>
                    <p style="margin-top: -11px;" class="text-info">
                    IMPORTANT: While reasonable e ort has been made to ensure accuracy, the information contained in this document has been sourced from various sources. The ASPIRE Property Advisor Network Pty Ltd to the maximum extent permitted by law, expressly disclaims all liability for any loss howsoever arising, directly or indirectly, and makes no representation or warranty, express or implied in relation to the fairness, currency, accuracy, reasonableness or completeness of the information contained in this document. This brochure is generic and for information purposes only and does not constitute nor form part of any contract of sale.
                    </p>
                </div>
                <div class="text-center">
                    <div class="logos" style="display: flex; justify-content: space-between; align-items: center;">
                        <img src="{{ asset('admin/assets/img/QPIA-logo.png') }}" alt="QPIA Logo" style="width: 138px;">
                        <img src="{{ asset('admin/assets/img/advisor-logo.png') }}" alt="Advisor Logo" style="width: 138px; align-self: center;">
                        <img src="{{ asset('admin/assets/img/PIPA.png') }}" alt="PIPA Logo" style="width: 138px;">
                    </div>
                </div>
                <div class="text-center pdf-footer mt-2">
                    <p><a href="https://www.aspirenetwork.com.au/" class="text-white">www.aspirenetwork.com.au</a> | 0452 216 390 | invest@aspirenetwork.net.a</p>
                </div>
            </div>
        </div><!---------------------End Fist Page--------------------->
        <div class="pdf-shortlist">
            <!-----------Second Page------------>
            <div class="row align-items-center top-bar">
                <div class="col-md-6">
                    <img src="{{ asset('admin/assets/img/aspire logo.png')}}" alt="Aspire Logo" height="40">
                </div>
                <div class="col-md-6 header-text">
                    <strong>PROPERTY SHORTLIST</strong><br>PREPARED FOR MR FRED & MRS MARY SMITH
                </div>
            </div>
            <div class="row mt-3">
                <div class="text-start bg-info text-white p-2">
                    <h5>PROPERTY SHORTLIST</h5>
                </div>
            </div>
            <div class="row mt-3">
                @foreach($properties as $property)
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            {{ $property->property_name ?? 'N/A' }}
                        </div>
                        @php
                           $propertyImage = $property->propertyImage->where('image_type', 'property')->first();$imagePath = $propertyImage
                           ? asset('upload/propertyImg/' . $propertyImage->image_name)
                           : asset('upload/no_img.png');
                        @endphp
                        <div class="position-relative" style="height: 220px;">
                            @if($property->indicative_package === 'yes')
                            <span class="badge bg-success position-absolute top-0 start-0 m-2">
                                Indicative Package
                            </span>
                            @endif
                            <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image" style="height: 100%; width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${{ number_format((float) str_replace(',', '', $property->property_price ?? 0)) }}</h5>
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item"><span>🛏️</span> {{ $property->available_rooms }} </li>
                                <li class="list-inline-item"><span>🛁</span> {{ $property->available_bathrooms }} </li>
                                <li class="list-inline-item"><span>🚗</span> {{ $property->available_parking }} </li>
                                <li class="list-inline-item"><span>%</span> {{ $property->rent_yeild ?? 'N/A' }}</li>
                            </ul>
                            <p>{{ $property->property_address ?? 'Location not set' }}</p>
                            <p>Stage: {{ $property->stage ?? 'N/A' }}</p>
                            <span style="width: 10px; height: 10px; background-color: blue; display: inline-block; margin-right: 6px;"></span>
                            {{ strtoupper($property->category->category_name ?? 'N/A') }}
                            <a href="{{ route('show.property', $property->id) }}" class="btn btn-sm btn-info float-end text-white">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card p-3">
                        <h5>{{$property->property_address}}</h5>
                        <p>{!! $property->property_description !!}</p>
                    </div>
                </div>
                @endforeach
            </div><!------------Second Page End------------>
           <!---------------Third Page------------------>
            <div class="shortlisted-comparision"> <!------------Shortlisted comparision------------->
                <div class="row mt-3">
                    <div class="text-start bg-info text-white p-2">
                        <h5>PROPERTY SHORTLIST</h5>
                    </div>
                </div>
                <!------------Shortilisted comparision Cards------------->
                <div class="row mt-5">
                    @foreach($properties as $property)
                    <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white text-center">
                            <h5>Property {{ $loop->iteration }}</h5>
                        </div>
                        @php
                          $propertyImage = $property->propertyImage->where('image_type', 'property')->first();
                          $imagePath = $propertyImage
                          ? asset('upload/propertyImg/' . $propertyImage->image_name)
                          : asset('upload/no_img.png');
                        @endphp
                        <div class="position-relative" style="height: 220px;">
                            @if($property->indicative_package === 'yes')
                            <span class="badge bg-success position-absolute top-0 start-0 m-2">
                                Indicative Package
                            </span>
                            @endif
                            <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image" style="height: 220px; width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body">
                            <p>
                                <span>🛏️</span> {{ $property->available_rooms ?? 0 }} &nbsp;
                                <span>🛁</span> {{ $property->available_bathrooms ?? 0 }} &nbsp;
                                <span>🚗</span> {{ $property->available_parking ?? 0 }}&nbsp;
                                <span>%</span> {{ $property->rent_yield ?? 0 }}
                            </p>
                            <h5>${{ number_format((float) str_replace(',', '', $property->property_price ?? 0)) }}</h5>
                            <p>{{ $property->property_name ?? 'N/A' }}</p>
                            <p>{{ $property->property_address ?? 'Location not set' }}</p>
                            <p>Stage: {{ $property->stage ?? 'N/A' }}</p>
                            <span style="width: 10px; height: 10px; background-color: blue; display: inline-block; margin-right: 6px;"></span>
                            {{ strtoupper($property->category->category_name ?? 'N/A') }}
                            <a href="{{ route('show.property', $property->id) }}" class="btn btn-sm btn-info float-end text-white">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!------------shortlisted comparision table------------->
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Field</th>
                            @foreach($properties as $property)
                            <th>Property {{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Price</td>
                            @foreach($properties as $property)
                            <td>${{ number_format((float) str_replace(',', '', $property->property_price ?? 0)) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Land Price</td>
                            @foreach($properties as $property)
                            <td>${{ number_format((float) str_replace(',', '', $property->land_price ?? 0)) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>House Price</td>
                            @foreach($properties as $property)
                            <td>${{ number_format((float) str_replace(',', '', $property->house_price ?? 0)) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Property Type</td>
                            @foreach($properties as $property)
                            <td>{{ $property->category->category_name ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Contract Type</td>
                            @foreach($properties as $property)
                            <td>{{ $property->contract->contract_type_name ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Titled</td>
                            @foreach($properties as $property)
                            <td>{{ $property->titled ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Est Titled</td>
                            @foreach($properties as $property)
                            <td>{{ $property->est_titled ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Rent Yield</td>
                            @foreach($properties as $property)
                            <td>{{ $property->rent_yield ?? 'N/A' }} %</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Vacancy Rate</td>
                            @foreach($properties as $property)
                            <td>{{ $property->vacancy_rate ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Land Or External Area</td>
                            @foreach($properties as $property)
                            <td>{{ $property->land_area ?? 'N/A' }} sqm</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>House Area</td>
                            @foreach($properties as $property)
                            <td>{{ $property->house_area ?? 'N/A' }} sqm</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Study</td>
                            @foreach($properties as $property)
                            <td>{{ $property->study ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Stamp Duty</td>
                            @foreach($properties as $property)
                            <td>@if($property->stamp_duty_est)${{ number_format($property->stamp_duty_est) }}@else N/A @endif</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Council Rate</td>
                            @foreach($properties as $property)
                            <td>@if($property->council_rate)${{ number_format($property->council_rate) }}@else TBA @endif
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Owners Corp</td>
                            @foreach($properties as $property)
                            <td>@if($property->owners_corp_fee)${{ number_format($property->owners_corp_fee) }}@else TBA or N/A @endif
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>EOI Deposite</td>
                            @foreach($properties as $property)
                            <td>@if($property->owners_corp_fee)${{ number_format($property->owners_corp_fee) }}@else TBA or N/A @endif
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Total Population</td>
                            @foreach($properties as $property)
                            <td>{{ $property->total_population ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td> Approx Distance to CBD</td>
                            @foreach ($properties as $property)
                            <td>{{ $property->distance_to_cbd ?? 'N/A' }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> <!---------------------End of Shortlisted comparision--------------------->
        <!----------------End Third Page------------------>

        <!-----------------Fourth Page--------------->
        <div class="row"><!----------Single Property Page------------>
            @foreach($properties as $property)
            <div class="text-center" style="margin-top: 36px;">
                <div class="overview-banner d-inline-flex align-items-center justify-content-center">
                    <span class="me-2 fs-1">PROPERTY OVERVIEW</span>
                    <div class="position-absolute end-0 me-3">
                        <img src="{{ asset('admin/assets/img/qr-code.png')}}" alt="QR" class="qr-code">
                    </div>
                </div>
            </div>
            <div class="text-center main-heading">
                <h1 class="mb-1">PROPERTY SHORTLIST</h1>
                <h1 class="mb-2">{{$property->property_address}}</h1>
                <small>Date: {{ \Carbon\Carbon::parse($property->created_at)->format('d/m/Y') }}</small>
            </div>
            <div class="text-center mt-0 mb-5">
                @php
                   $propertyImage = $property->propertyImage->where('image_type', 'property')->first();
                   $imagePath = $propertyImage
                   ? asset('upload/propertyImg/' . $propertyImage->image_name)
                   : asset('upload/no_img.png');
                @endphp
                <div class="position-relative" style="height: 220px;">
                    @if($property->indicative_package === 'yes')
                    <span class="badge bg-success position-absolute top-0 start-0 m-2">
                        Indicative Package
                    </span>
                    @endif
                    <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image"
                     style="height: 329px; width: 1008px; object-fit: contain;">
                </div>
            </div>
            <div class="row" style="margin-top: 86px;">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            {{$property->property_name ?? 'N/A'}}
                        </div>
                        @php
                           $propertyImage = $property->propertyImage->where('image_type', 'property')->first();
                           $imagePath = $propertyImage
                           ? asset('upload/propertyImg/' . $propertyImage->image_name)
                           : asset('upload/no_img.png');
                        @endphp
                        <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">${{ number_format((float) str_replace(',', '', $property->property_price ?? 0)) }}</h5>
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item"><span>🛏️</span> {{ $property->available_rooms }} &nbsp; &nbsp;</li>
                                <li class="list-inline-item"><span>🛁</span> {{ $property->available_bathrooms }} &nbsp; &nbsp;</li>
                                <li class="list-inline-item"><span>🚗</span> {{ $property->available_parking }} &nbsp; &nbsp;</li>
                                <li class="list-inline-item"><span>%</span> {{$property->rent_yield}}</li>
                            </ul>
                            <p>{{ $property->property_name ?? 'N/A' }}</p>
                            <p>{{ $property->property_address ?? 'Location not set' }}</p>
                            <p>Stage: {{ $property->stage ?? 'N/A' }}</p>
                            <span style="width: 10px; height: 10px; background-color: blue; display: inline-block; margin-right: 6px;"></span>
                            {{ strtoupper($property->category->category_name ?? 'N/A') }}
                            <a href="{{ route('show.property', $property->id) }}" class="btn btn-sm btn-info float-end text-white">Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card p-3">
                        <h5>{{$property->property_address}}</h5>
                        <p>{!! $property->property_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="price-box bg-info text-white p-3">
                    <div class="mb-2 fs-4">{{ $property->property_address }}</div>
                    <div class="d-flex justify-content-between">
                        <span>{{ $property->project_name }}, {{ $property->area_name }}</span>
                        <span class="fs-4">${{ number_format((float) str_replace(',', '', $property->property_price ?? 0)) }}</span>
                    </div>
                </div>
            </div>
            <!-------------End Fourth Page---------------->
            <!---------------Fifth Page------------->
            <div class="row mt-2">
                <div class="col-md-6">
                    <div style="border: 1px solid #ccc; display: inline-block; padding: 4px;">
                        @php
                           $propertyImage = $property->propertyImage->where('image_type', 'property')->first();
                           $imagePath = $propertyImage
                           ? asset('upload/propertyImg/' . $propertyImage->image_name)
                           : asset('upload/no_img.png');
                        @endphp
                        <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image" style="max-width: 100%;">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 text-center">
                            <div style="border: 1px solid #ccc; display: inline-block; padding: 10px;">
                                <div>
                                    @php
                                       $propertyImage = $property->propertyImage->where('image_type', 'project')->first();
                                       $imagePath = $propertyImage
                                       ? asset('upload/propertyImg/' . $propertyImage->image_name)
                                       : asset('upload/no_img.png');
                                    @endphp
                                    <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image" style="width: 100%; height: auto;">
                                </div>
                                <table class="table table-bordered mt-1 nowrap">
                                    <tr>
                                        <th>Project Name</th>
                                        <td>{{$property->project_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Prices From</th>
                                        <td>${{ number_format((float) str_replace(',', '', $property->prices_from ?? 0)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number Available</th>
                                        <td>{{$property->number_available}}</td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div style="border: 1px solid #ccc; display: inline-block; padding: 10px;">
                            <div>
                                 @php
                    $propertyImage = $property->propertyImage->where('image_type', 'area')->first();
                    $imagePath = $propertyImage
                        ? asset('upload/propertyImg/' . $propertyImage->image_name)
                        : asset('upload/no_img.png');
                @endphp

                <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image"
                    style="width: 100%; height: auto;">

                            </div>
                            <table class="table table-bordered mt-1 nowrap">
                                <tr>
                                    <th>Area Name</th>
                                    <td>{{$property->area_name}}</td>
                                </tr>
                                <tr>
                                    <th>Total Population</th>
                                    <td>{{$property->total_population}}</td>
                                </tr>
                                <tr>
                                    <th>Distance To CBD</th>
                                    <td>{{$property->distance_to_cbd}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <div style="border: 1px solid #ccc; display: inline-block; padding: 10px;">
                             @php
                    $propertyImage = $property->propertyImage->where('image_type', 'floor_plan')->first();
                    $imagePath = $propertyImage
                        ? asset('upload/propertyImg/' . $propertyImage->image_name)
                        : asset('upload/no_img.png');
                @endphp

                <img src="{{ $imagePath }}" class="img-fluid" alt="Property Image"
                    style="max-width: 100%; height: auto;">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h5 class="specification bg-info text-white p-3">Specification</h5>
                </div>
                <div class="text-center">
                     <ul class="list-inline mb-2">
                            <li class="list-inline-item"><span>🛏️</span> {{ $property->available_rooms }} &nbsp; &nbsp;</li>
                            <li class="list-inline-item"><span>🛁</span> {{ $property->available_bathrooms }} &nbsp; &nbsp;</li>
                            <li class="list-inline-item"><span>🚗</span> {{ $property->available_parking }} &nbsp; &nbsp;</li>
                        </ul>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Property Id</th>
                        <td>{{$property->property_id}}</td>
                    </tr>
                    <tr>
                        <th>Property Type</th>
                        <td>{{$property->category->category_name}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ ucfirst($property->status) }}</td>
                    </tr>
                    <tr>
                        <th>Contract Type</th>
                        <td>{{$property->contract->contract_type_name}}</td>
                    </tr>
                    <tr>
                        <th>Title Type</th>
                        <td>{{ ucfirst($property->title_type) }}</td>
                    </tr>
                    <tr>
                        <th>Titled</th>
                        <td>No</td>
                    </tr>
                    @if(!empty($property->indicative_package))
                    <tr>
                        <th>Indicative Package</th>
                        <td>{{ ucfirst($property->indicative_package) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Estimated Date</th>
                        <td>{{ \Carbon\Carbon::parse($property->estimated_date)->format('d/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Rent Yeild</th>
                        <td>{{$property->rent_yield}} %</td>
                    </tr>
                    @if(!empty($property->smsf))
                    <tr>
                        <th>SMSF</th>
                        <td>{{ucfirst($property->smsf)}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->approx_weekly_rent))
                    <tr>
                        <th>Approx.Weekly Rent</th>
                        <td>${{$property->approx_weekly_rent}}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Vacancy Rate</th>
                        <td>{{$property->vacancy_rate}} %</td>
                    </tr>
                    <tr>
                        <th>Land Area</th>
                        <td>{{$property->land_area}} sqm</td>
                    </tr>
                    <tr>
                        <th>House Area</th>
                        <td>{{$property->house_area}} sqm</td>
                    </tr>
                    @if(!empty($property->land_price))
                    <tr>
                        <th>Land Price</th>
                        <td>${{ str_replace(',', '', $property->land_price) }}</td>
                    </tr>
                    @endif
                    @if(!empty($property->house_price))
                    <tr>
                        <th>House Price</th>
                        <td>${{ str_replace(',', '', $property->house_price) }}</td>
                    </tr>
                    @endif
                    @if(!empty($property->total_price))
                    <tr>
                        <th>Total Price</th>
                        <td>${{ str_replace(',', '', $property->total_price )}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->stage))
                    <tr>
                        <th>Stage</th>
                        <td>{{$property->stage}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->study))
                    <tr>
                        <th>Study</th>
                        <td>{{$property->study}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->design->design))
                    <tr>
                        <th>Design</th>
                        <td>{{$property->design->design}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->stamp_duty_est))
                    <tr>
                        <th>Stamp duty Est</th>
                        <td>${{ str_replace(',', '', $property->stamp_duty_est )}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->gov_transfer_fee))
                    <tr>
                        <th> Gov. Transfer Fee</th>
                        <td>${{ str_replace(',', '', $property->gov_transfer_fee )}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->council_rate))
                    <tr>
                        <th>Council Rate</th>
                        <td>${{ str_replace(',','', $property->council_rate )}}</td>
                    </tr>
                    @endif
                    @if(!empty($property->owners_corp_fee))
                    <tr>
                        <th>Owners Corp Fee</th>
                        <td>${{ str_replace(',', '', $property->owners_corp_fee )}}</td>
                    </tr>
                    @endif
                </table>
                <div class="row" style="margin-top: 64px;">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="text-center">
                            <!-- Logo -->
                            <div class="aspirelogo mb-5">
                                <img src="{{ asset('admin/assets/img/aspire logo.png')}}" alt="Aspire Logo" height="50">
                            </div>
                            <!-- Information -->
                            <div class="information">
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-person"></i> <strong>Advisor:</strong> Richard Crabb</li>
                    <li><i class="bi bi-phone"></i> 0452 216 390</li>
                    <li><i class="bi bi-envelope"> </i> invest@aspirenetwork.net.au</li>
                </ul>
            </div>

            <!-- QR Code -->
            <div class="qr-code mt-3">
                <img src="{{ asset('admin/assets/img/qr-code.png')}}" alt="QR" style="height: 135px;">
            </div>
        </div>
    </div>
</div>


            </div>
        </div>
        <!----------------------End Fifth Page--------------------->
        <!------------------------Sixth Page-------------------->
        <div class="text-start mt-3">
            <h5 class="price-box bg-info text-white">PROPERTY {{ $loop->iteration }}: {{$property->property_address}}</h5>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h5><strong><a href="https://www.aspirenetwork.com.au/" class="text-dark">PORTAL DOWNLOADABLE REFERENCE MATERIAL</a></strong>
                </h5>
                <div class="link"><a href="https://www.aspirenetwork.com.au/">https://www.aspirenetwork.com.au/</a>
                </div>
            </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> Property Download </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Colour Placement</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Developer Supplied Rental Appraisal</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Fixtures</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Colour Selection</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Type F & D Architectural Plan</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Northwood Brochare</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Type F-Pencil Sketched Foorplan</a>
                        </li>
                    </ul>
                    <div class="card-footer text-center">
                        <button class="btn btn-custom">Click here for more info</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> Property Download </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Location Map</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Masterplan</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Site Plan</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Aerial View</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Amenties Map</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Aerial Map</a>
                        </li>
                    </ul>
                    <div class="card-footer text-center">
                        <button class="btn btn-custom">Click here for more info</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> Area Downloads</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">CoreLogic - Statistics Report (Apr-21) - 07/04/2021 1:43 am</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">CoreLogic - Suburb Report (Apr-21) - 07/04/2021 1:45 am</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">SQM Postcode Snapshot Report (Apr-21) - 28/04/2021 6:00 pm</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">ASPIRE Research Document - 12/01/2021 6:24 pm</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Type F & D Architectural Plan</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Northwood Brochare</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Type F-Pencil Sketched Foorplan</a>
                        </li>
                    </ul>
                    <div class="card-footer text-center">
                        <button class="btn btn-custom">Click here for more info</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Region-State-Australia Downloads</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-link text-info"></i><a href="#">QLD Major Infrastructure Projects Report-Feb 19</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">ATO Rental Properties Guide 2020</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">CoreLogic - Regional Markert Update - Feb 2021</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Australian Proerty Buyer's Legal Guide - LawLab</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">CoreLogic - Australian Housing Markert Charts - April 2021</a>
                        </li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">CoreLogic - Australian Housing Markert Update - May 21</a>
                        </li>
                    </ul>
                    <div class="card-footer text-center">
                        <button class="btn btn-custom">Click here for more info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col-md-12">
            <h5 class="text-dark"><strong>EXTERNAL REFERENCE & RESEARCH LINKS</strong></h5>
            <div class="link text-info">PORTAL EXTERNAL LINKS</div>
        </div>
        <div class="row g-4">
            <!-- Left Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">External Reference Links</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Wikipedia</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">2016 Census QuickStats</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Community Profile</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Brisbane City Council</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Underground Bus and Train Tunnel</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Brisbane Airport Expansion</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Kurilpa Riverfront Renewal</a></li>
                        <li class="list-group-item"><i class="bi bi-link text-info"></i> <a href="#">Brisbane property market update - January 2021</a></li>
                    </ul>
                    <div class="card-footer text-center">
                        <button class="btn btn-custom">Click here for more info</button>
                    </div>
                </div>
            </div>
            <!-- Right Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Area Info</div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Median House Price</td>
                                    <td>$710,000</td>
                                </tr>
                                <tr>
                                    <td>Weekly Median Advertised Rent</td>
                                    <td>398</td>
                                </tr>
                                <tr>
                                    <td>Total Population</td>
                                    <td>7237</td>
                                </tr>
                                <tr>
                                    <td>Median Age</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>No. Private Dwellings</td>
                                    <td>2624</td>
                                </tr>
                                <tr>
                                    <td>Weekly Median Household Income</td>
                                    <td>2126</td>
                                </tr>
                                <tr>
                                    <td>Approx time to CBD</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>Approx Distance to CBD</td>
                                    <td>10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-custom">Click here for more info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------End Sixth Page----------------------->
    <!----------------------------Seventh Page------------------>
      <div class="price-box bg-info text-white p-3 mt-4 d-flex justify-content-between align-items-center">
    <h6 class="mb-0">PROPERTY INVESTMENT ANALYSIS AND PROJECTIONS</h6>
    <h6 class="mb-0 text-end">{{ $property->property_address }}</h6>
</div>

     <div class="row g-5 mt-0">
    <!-- Left: Image -->
    <div class="col-md-5">
        @php
                    $propertyImage = $property->propertyImage->where('image_type', 'property')->first();
                    $imagePath = $propertyImage
                        ? asset('upload/propertyImg/' . $propertyImage->image_name)
                        : asset('upload/no_img.png');
                @endphp

                <img src="{{ $imagePath }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Property Image"
                    style="max-width: 100%; height: auto;">

    </div>

    <!-- Right: Details -->
    <div class="col-md-7 property-info">
      <div class="property-row"><span class="property-label">PROPERTY PURCHASE PRICE</span> <span class="property-value">${{ number_format((float) str_replace(',', '', $property->property_price ?? 0)) }}</span></div>
      <div class="property-row"><span class="property-label">INITIAL CASH / EQUITY INVESTMENT</span> <span class="property-value">$100,000</span></div>
      <div class="property-row"><span class="property-label">PURCHASE COSTS ESTIMATE</span> <span class="property-value">$25,440</span></div>
      <div class="property-row"><span class="property-label">INITIAL LOAN AMOUNT</span> <span class="property-value">$555,130</span></div>
      <div class="property-row"><span class="property-label">GROSS RENTAL YIELD YR 1</span> <span class="property-value">5.21%</span></div>
      <div class="property-row"><span class="property-label">RENTAL VACANCY EST (DAYS PA)</span> <span class="property-value">7.3</span></div>
      <div class="property-row"><span class="property-label">WEEKLY AFTER TAX CASH FLOW YR 1</span> <span class="property-value text-danger">-$142</span></div>
      <div class="property-row"><span class="property-label">WEEKLY GROSS RENT YEAR 1</span> <span class="property-value">$630</span></div>
    </div>
  </div>

<div class="table-responsive mt-3">
    <table class="table table-bordered align-middle">
      <thead>
        <tr>
  <th colspan="6">
    <div class="d-flex justify-content-between">
      <span>DATE CREATED: {{ \Carbon\Carbon::parse($property->created_at)->format('d-M-Y') }}</span>
      <span>INVESTMENT PROPERTY PROJECTIONS OVER 20 YEAR</span>
    </div>
  </th>
</tr>

        <tr>
          <th> </th>
          <th>Year 1 (2022)</th>
          <th>Year 5 (2026)</th>
          <th>Year 10 (2031)</th>
          <th>Year 15 (2036)</th>
          <th>Year 20 (2041)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>WEEKLY CASH FLOW (AFTER-TAX)</td>
          <td>(142)</td>
          <td>(150)</td>
          <td>(168)</td>
          <td>(166)</td>
          <td>(197)</td>
        </tr>
        <tr>
          <td>PROPERTY VALUE</td>
          <td class="highlight">$647,870</td>
          <td class="highlight">$729,183</td>
          <td class="highlight">$845,323</td>
          <td class="highlight">$979,962</td>
          <td class="highlight">$1,136,000</td>
        </tr>
        <tr>
          <td>CAPITAL GROWTH</td>
          <td>$18,870</td>
          <td>$100,183</td>
          <td>$216,323</td>
          <td>$350,962</td>
          <td>$507,000</td>
        </tr>
        <tr>
          <td>EQUITY</td>
          <td>$106,885</td>
          <td>$249,993</td>
          <td>$456,573</td>
          <td>$698,919</td>
          <td>$983,276</td>
        </tr>
        <tr>
          <td>DEBT</td>
          <td>$540,985</td>
          <td>$479,190</td>
          <td>$388,751</td>
          <td>$281,043</td>
          <td>$152,768</td>
        </tr>
        <tr>
          <td>CAPITAL GROWTH</td>
          <td>3.00%</td>
          <td>3.00%</td>
          <td>3.00%</td>
          <td>3.00%</td>
          <td>3.00%</td>
        </tr>
        <tr>
          <td>INFLATION (CPI)</td>
          <td>1.50%</td>
          <td>1.50%</td>
          <td>1.50%</td>
          <td>1.50%</td>
          <td>1.50%</td>
        </tr>
        <tr>
          <td>GROSS RENT (PA)</td>
          <td>$32,105</td>
          <td>$34,075</td>
          <td>$36,708</td>
          <td>$39,545</td>
          <td>$42,601</td>
        </tr>
        <tr>
          <td>RENTAL EXPENSE (PA)</td>
          <td>$9,091</td>
          <td>$9,649</td>
          <td>$10,395</td>
          <td>$11,198</td>
          <td>$12,063</td>
        </tr>
        <tr>
          <td>LOAN REPAYMENTS (PA)</td>
          <td>$33,349</td>
          <td>$33,350</td>
          <td>$33,350</td>
          <td>$33,349</td>
          <td>$33,350</td>
        </tr>
        <tr>
          <td>BANK INTEREST (PA)</td>
          <td>$19,204</td>
          <td>$17,082</td>
          <td>$13,976</td>
          <td>$10,276</td>
          <td>$5,871</td>
        </tr>
        <tr>
          <td>DEPRECIATION DEDUCTION</td>
          <td>$11,738</td>
          <td>$9,735</td>
          <td>$8,486</td>
          <td>$9,893</td>
          <td>$7,864</td>
        </tr>
        <tr>
          <td>OTHER DEDUCTIONS</td>
          <td>$138</td>
          <td>$138</td>
          <td>$138</td>
          <td>$138</td>
          <td>$138</td>
        </tr>
        <tr>
          <td>TOTAL DEDUCTIONS</td>
          <td>$40,171</td>
          <td>$36,603</td>
          <td>$32,855</td>
          <td>$31,367</td>
          <td>$25,797</td>
        </tr>
        <tr>
          <td>TAX CREDIT (JOINT)</td>
          <td>$2,964</td>
          <td>$1,526</td>
          <td>$2,640</td>
          <td>$1,368</td>
          <td>$7,423</td>
        </tr>
        <tr>
          <td>PRE TAX CASHFLOW (PA)</td>
          <td>$-10,335</td>
          <td>$-8,924</td>
          <td>$-7,037</td>
          <td>$-5,002</td>
          <td>$-2,812</td>
        </tr>
        <tr>
          <td>AFTER-TAX CASH FLOW (PA)</td>
          <td>$-7,372</td>
          <td>$-7,798</td>
          <td>$-8,750</td>
          <td>$-8,642</td>
          <td>$-10,234</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!---------------------End Seventh Page------------>
  @endforeach
  </div>
    <div class="footer mt-4 text-center">
        <div>Date: 04/05/2021 &nbsp;&nbsp; | &nbsp;&nbsp; © ASPIRE Property Advisor Network 2021 &nbsp;&nbsp; | &nbsp;&nbsp; www.aspirenetwork.net.au</div>
    </div>
    </div>
</div>
@endsection

