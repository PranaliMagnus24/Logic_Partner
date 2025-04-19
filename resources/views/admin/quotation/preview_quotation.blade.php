@extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')
<div class="container">
    <div class="text-end mb-3">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="{{ route('create.quotation')}}">Back</a>
    </div>
    <table class="table table-bordered">
        <tr><th>Report Name</th><td>{{ $data['report_name'] ?? '-' }}</td></tr>
        <tr><th>Summary</th><td>{{ $data['summary'] ?? '-' }}</td></tr>
        <tr><th>Property</th><td>{{ $data['property'] ?? '-' }}</td></tr>
        <tr><th>Contract Type</th><td>{{ $data['contract_type'] ?? '-' }}</td></tr>
        <tr><th>Land Purchase Cost</th><td>{{ $data['land_purchase_cost'] ?? '-' }}</td></tr>
        <tr><th>Building Cost</th><td>{{ $data['building_cost'] ?? '-' }}</td></tr>
        <tr><th>Purchase Price</th><td>{{ $data['purchase_price'] ?? '-' }}</td></tr>
        <tr><th>EOI Deposite land</th><td>{{ $data['eoi_deposite_land'] ?? '-' }}</td></tr>
        <tr><th>Land Deposite</th><td>{{ $data['land_deposite_percent'] ?? '-' }} &nbsp; {{ $data['land_deposite_price'] ?? '-' }}</td></tr>
        <tr><th>Building Deposite</th><td>{{ $data['building_deposite_percent'] ?? '-' }} &nbsp; {{ $data['building_deposite_price'] ?? '-' }}</td></tr>
        <tr><th>Cash Deposite $</th><td>{{ $data['cash_deposite'] ?? '-' }}</td></tr>
        <tr><th>Contigency allowance as % of the purchase price</th><td>{{ ucfirst($data['contigency_purchase_price']) }}</td></tr>
        <tr><th>Capital Growth PA</th><td>{{ $data['capital_growth_pa'] ?? '-' }}</td></tr>
        <tr><th>State</th><td>{{ $data['state'] ?? '-' }}</td></tr>
        <tr><th>Stamp Duty</th><td>{{ $data['stamp_duty'] ?? '-' }}</td></tr>
        <tr><th>Trans</th><td>{{ $data['trans'] ?? '-' }}</td></tr>
        <tr><th>Soliditor Price</th><td>{{ $data['soliditor_price'] ?? '-' }}</td></tr>
        <tr><th>Misc Purchase Cost</th><td>{{ $data['misc_purchase_cost'] ?? '-' }}</td></tr>
        <tr><th>EOI Dates</th><td>{{ $data['eoi_date'] ?? '-' }}</td></tr>
        <tr><th>Unconditional days estimates</th><td>{{ $data['unconditional_days'] ?? '-' }}</td></tr>
        <tr><th>Titles</th><td>{{ $data['titles'] ?? '-' }}</td></tr>
        <tr><th>Estimates Titled Date</th><td>{{ $data['estimate_titled_date'] ?? '-' }}</td></tr>
        <tr><th>Settlement Days</th><td>{{ $data['settlement_days'] ?? '-' }}</td></tr>
        <tr><th>Estimate Settlement Date</th><td>{{ $data['estimate_settlement_date'] ?? '-' }}</td></tr>
        <tr><th>Site Start(weeks)</th><td>{{ $data['site_start_week'] ?? '-' }}</td></tr>
        <tr><th>Handover(Amount Due)</th><td>{{ $data['handover_amount'] ?? '-' }}</td></tr>
        <tr><th>Handover(Days)</th><td>{{ $data['handover_days'] ?? '-' }}</td></tr>
        <tr><th>Total Time(months)</th><td>{{ $data['total_time_month'] ?? '-' }}</td></tr>
        <tr><th>Template</th><td>{{ $data['payment_template'] ?? '-' }}</td></tr>
    </table>


</div>
@endsection
