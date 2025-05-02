@extends('admin.layouts.layout')

@section('title', 'Property Management')
@section('admin')
@section('pagetitle', 'Property Management')

<div class="container">
    <div class="text-end mb-3">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="{{ route('create.property')}}" class="btn btn-secondary">Back</a>
    </div>

    <div class="mb-3 bg-primary text-white text-center p-2 rounded">
        <h5>Property Details</h5>
    </div>
    <table class="table table-bordered">
        <tr><th>Property Type</th><td>{{ $preview['property_type'] ?? '-' }}</td></tr>
        <tr><th>Contract Type</th><td>{{ $preview['contract_type'] ?? '-' }}</td></tr>
        <tr><th>Title Type</th><td>{{ $preview['title_type'] ?? '-' }}</td></tr>
        <tr><th>Titled</th><td>{{ $preview['titled'] ?? '-' }}</td></tr>
        <tr><th>Indicative Package</th><td>{{ $preview['indicative_package'] ?? '-' }}</td></tr>
        <tr><th>Estimated Date</th><td>{{ $preview['estimated_date'] ?? '-' }}</td></tr>
        <tr><th>Rent Yield</th><td>{{ $preview['rent_yield'] ?? '-' }}</td></tr>
        <tr><th>SMSF</th><td>{{ $preview['smsf'] ?? '-' }}</td></tr>
        <tr><th>ADDM</th><td>{{ $preview['addm'] ?? '-' }}</td></tr>
        <tr><th>Approx Weekly Rent</th><td>{{ $preview['approx_weekly_rent'] ?? '-' }}</td></tr>
        <tr><th>Vacancy Rate</th><td>{{ $preview['vacancy_rate'] ?? '-' }}</td></tr>
        <tr><th>Land Area</th><td>{{ $preview['land_area'] ?? '-' }} sqm</td></tr>
        <tr><th>House Area</th><td>{{ $preview['house_area'] ?? '-' }} sqm</td></tr>
        <tr><th>Design</th><td>{{ $preview['design'] ?? '-' }}</td></tr>
        <tr><th>Land Price</th><td>{{ $preview['land_price'] ?? '-' }}</td></tr>
        <tr><th>House Price</th><td>{{ $preview['house_price'] ?? '-' }}</td></tr>
        <tr><th>Total Price</th><td>{{ $preview['total_price'] ?? '-' }}</td></tr>
        <tr><th>Stage</th><td>{{ $preview['stage'] ?? '-' }}</td></tr>
        <tr><th>Stamp Duty EST</th><td>{{ $preview['stamp_duty_est'] ?? '-' }}</td></tr>
        <tr><th>Gov. Transfer Fee</th><td>{{ $preview['gov_transfer_fee'] ?? '-' }}</td></tr>
        <tr><th>Owners Corp Fee</th><td>{{ $preview['owners_corp_fee'] ?? '-' }}</td></tr>
        <tr><th>Status</th><td>{{ $preview['status'] ?? '-' }}</td></tr>
    </table>

    <div class="mb-3 bg-primary text-white text-center p-2 rounded">
        <h5>Project Details</h5>
    </div>
    <table class="table table-bordered">
        <tr><th>Project Name</th><td>{{ $preview['project_name'] ?? '-' }}</td></tr>
        <tr><th>Prices From</th><td>{{ $preview['prices_from'] ?? '-' }}</td></tr>
        <tr><th>Number Available</th><td>{{ $preview['number_available'] ?? '-' }}</td></tr>
    </table>

    <div class="mb-3 bg-primary text-white text-center p-2 rounded">
        <h5>Area Details</h5>
    </div>
    <table class="table table-bordered">
        <tr><th>Area Name</th><td>{{ $preview['area_name'] ?? '-' }}</td></tr>
        <tr><th>Total Population</th><td>{{ $preview['total_population'] ?? '-' }}</td></tr>
        <tr><th>Distance to CBD</th><td>{{ $preview['distance_to_cbd'] ?? '-' }}</td></tr>
    </table>
</div>
@endsection
