@extends('admin.layouts.layout')
@section('title', 'Property Shortlist')
@section('admin')

@section('pagetitle', 'Property Shortlist')

<div class="container mt-5">
    <div class="text-end mb-3">
        <a href="{{ route('list.property')}}" class="btn btn-primary">Back</a>
    </div>
    <!------------Shortilisted Cards------------->
    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h5>Property {{ $loop->iteration }}</h5>
                    </div>

                    @php
                    $propertyImage = $property->propertyImage->where('image_type', 'property')->first();
                    $imagePath = $propertyImage
                        ? asset('upload/propertyImg/' . $propertyImage->image_name)
                        : asset('upload/no_img.png');
                @endphp

                <img src="{{ $imagePath }}" class="card-img-top" alt="Property Image"
                     style="height: 220px; width: 100%; object-fit: contain;">


                    <div class="card-body">
                        <p><span>🛏️</span> {{ $property->available_rooms ?? 0 }} &nbsp;
                            <span>🛁</span> {{ $property->available_bathrooms ?? 0 }} &nbsp;
                            <span>🚗</span> {{ $property->available_parking ?? 0 }}&nbsp;
                            <span>%</span> {{ $property->rent_yield ?? 0 }}
                        </p>

                        <h5>${{ $property->property_price ?? 'N/A' }}</h5>
                        <p>{{ $property->property_name ?? 'N/A' }}</p>
                        <p>{{ $property->property_address ?? 'Location not set' }}</p>
                        <p>Stage: {{ $property->stage ?? 'N/A' }}</p>
                        <span>
                            <span style="width: 10px; height: 10px; background-color: blue; display: inline-block; margin-right: 6px;"></span>
                            {{ strtoupper($property->category->category_name ?? 'N/A') }}
                        </span>
                        <a href="{{ route('show.property', $property->id) }}" class="btn btn-sm btn-primary float-end">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!------------shortlisted table------------->
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
                    <td>${{ $property->property_price ?? '0.00' }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Land Price</td>
                    @foreach($properties as $property)
                    <td>${{ $property->land_price ?? '0.00' }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>House Price</td>
                    @foreach($properties as $property)
                    <td>${{ $property->house_price ?? '0.00' }}</td>
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
                    <td>Market Rent</td>
                    @foreach($properties as $property)
                    <td>{{ $property->market_rent ?? 'N/A' }}</td>
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
                    <td>@if($property->stamp_duty_est)${{ number_format($property->stamp_duty_est, 2) }}@else N/A @endif</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Council Rate</td>
                    @foreach($properties as $property)
                    <td>@if($property->council_rate)${{ number_format($property->council_rate, 2) }}@else TBA @endif
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td>Owners Corp</td>
                    @foreach($properties as $property)
                    <td>@if($property->owners_corp_fee)${{ number_format($property->owners_corp_fee, 2) }}@else TBA or N/A @endif
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td>EOI Deposite</td>
                    @foreach($properties as $property)
                    <td>@if($property->owners_corp_fee)${{ number_format($property->owners_corp_fee, 2) }}@else TBA or N/A @endif
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
</div>


@endsection
