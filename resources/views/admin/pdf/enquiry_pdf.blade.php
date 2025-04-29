<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    h4.header-line {
        display: flex;
        justify-content: space-between;
        background: #000;
        color: #FFF;
        margin: 0 0 1em;
        padding: 0.5em 1em;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 2em;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .text-center {
        text-align: center;
    }

    .mt-3 {
        margin-top: 1.5em;
    }
</style>

@extends('admin.pdf.layouts.layout')

@section('title', 'Enquiry')

@section('pdf-content')
<div style="padding: 10px 20px; border-bottom: 1px solid #ccc;">
    <h2 style="margin: 0;">{{$enquiry->project_name}}</h2>
    <p style="margin: 0;">{{$enquiry->project_location}}</p>
</div>
<h4 class="header-line text-center">
    <span>Enquiry Details</span>
</h4>
<table class="table">
    <tbody>
        <tr>
            <td>Client Name</td>
            <td>{{$enquiry->customer_name}}</td>
        </tr>
        <tr>
            <td>Second Client Name</td>
            <td>{{$enquiry->second_customer_name}}</td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>{{$enquiry->project_name}}</td>
        </tr>
        <tr>
            <td>Project Location</td>
            <td>{{$enquiry->project_location}}</td>
        </tr>
        <tr>
            <td>Estimated Budget</td>
            <td>{{$enquiry->estimated_budget}}</td>
        </tr>
        <tr>
            <td>Estimated Time</td>
            <td>{{$enquiry->estimated_timeline}}</td>
        </tr>
        <tr>
            <td>Enquiry Name</td>
            <td>{{$enquiry->enquiry_name}}</td>
        </tr>
        <tr>
            <td>Stage</td>
            <td>{{$enquiry->stage}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{$enquiry->status}}</td>
        </tr>
        <tr>
            <td>Follow up date</td>
            <td>{{ \Carbon\Carbon::parse($enquiry->follow_up_date)->format('d M Y')}}</td>
        </tr>
        <tr>
            <td>Follow up time</td>
            <td>{{$enquiry->follow_up_time}}</td>
        </tr>
        <tr>
            <td>Report Name</td>
            <td>{{$enquiry->report_name}}</td>
        </tr>
        <tr>
            <td>Current Stage</td>
            <td>{{ \Carbon\Carbon::parse($enquiry->current_stage_date)->format('d M Y')}}</td>
        </tr>
        <tr>
            <td>Created Date</td>
            <td>{{ \Carbon\Carbon::parse($enquiry->created_date)->format('d M Y')}}</td>
        </tr>
        <tr>
            <td>Enquiry Type</td>
            <td>{{$enquiry->enquiry_type}}</td>
        </tr>
        <tr>
            <td>Enquiry Source</td>
            <td>{{$enquiry->enquiry_source}}</td>
        </tr>
        <tr>
            <td>Best time to call</td>
            <td>{{ \Carbon\Carbon::parse($enquiry->best_time_to_call . ':00')->format('g A') }}
            </td>
        </tr>
    </tbody>
</table>









@endsection
