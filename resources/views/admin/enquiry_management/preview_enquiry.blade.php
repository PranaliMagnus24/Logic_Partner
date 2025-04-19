@extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')
<div class="container">
    <div class="text-end mb-3">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="{{ route('create.enquiry')}}">Back</a>
    </div>
    <table class="table table-bordered">
        <tr><th>Project Name</th><td>{{ $data['project_name'] ?? '-' }}</td></tr>
        <tr><th>Project Location</th><td>{{ $data['project_location'] ?? '-' }}</td></tr>
        <tr><th>Estimated Budget</th><td>{{ $data['estimated_budget'] ?? '-' }}</td></tr>
        <tr><th>Estimated Timeline</th><td>{{ $data['estimated_timeline'] ?? '-' }}</td></tr>
        <tr><th>Client Name</th><td>{{ $data['customer_name'] ?? '-' }}</td></tr>
        <tr><th>Second Client Name</th><td>{{ $data['second_customer_name'] ?? '-' }}</td></tr>
        <tr><th>Enquiry Name</th><td>{{ $data['enquiry_name'] ?? '-' }}</td></tr>
        <tr><th>Stage</th><td>{{ $data['stage'] ?? '-' }}</td></tr>
        <tr><th>Status</th><td>{{ $data['status'] ?? '-' }}</td></tr>
        <tr><th>Follow Up Date</th><td>{{ $data['follow_up_date'] ?? '-' }}</td></tr>
        <tr><th>Follow Up Time</th><td>{{ $data['follow_up_time'] ?? '-' }}</td></tr>
        <tr><th>Report Name</th><td>{{ $data['report_name'] ?? '-' }}</td></tr>
        <tr><th>Current Stage Date</th><td>{{ $data['current_stage_date'] ?? '-' }}</td></tr>
        <tr><th>Enquiry Type</th><td>{{ $data['enquiry_type'] ?? '-' }}</td></tr>
        <tr><th>Enquiry Source</th><td>{{ $data['enquiry_source'] ?? '-' }}</td></tr>
        <tr><th>Created Date</th><td>{{ $data['created_date'] ?? '-' }}</td></tr>
        <tr><th>Best Time To Call</th><td>{{ $data['best_time_to_call'] ?? '-' }}</td></tr>
    </table>


</div>
@endsection
