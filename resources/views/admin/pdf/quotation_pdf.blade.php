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

@section('title', 'Quotation')

@section('pdf-content')

<h4 class="header-line text-center">
    <span>Property Details</span>
</h4>
<table class="table">
    <tbody>
        <tr>
            <td>Report Name</td>
            <td>{{$quotation->enquiry->report_name}}</td>
        </tr>
        <tr>
            <td>Summary</td>
            <td>{{$quotation->summary}}</td>
        </tr>
        <tr>
            <td>Property</td>
            <td>{{$quotation->property}}</td>
        </tr>
        <tr>
            <td>Contract Type</td>
            <td>{{$quotation->contract_type}}</td>
        </tr>
        <tr>
            <td>Land Purchase Cost</td>
            <td>{{$quotation->land_purchase_cost}}</td>
        </tr>
        <tr>
            <td>Building Cost</td>
            <td>{{$quotation->building_cost}}</td>
        </tr>
        <tr>
            <td>Purchase Price</td>
            <td>{{$quotation->purchase_price}}</td>
        </tr>
        <tr>
            <td>EOI Deposit Land</td>
            <td>{{$quotation->eoi_deposite_land}}</td>
        </tr>
        <tr>
            <td>EOI Deposit Build</td>
            <td>{{$quotation->eoi_deposite_build}}</td>
        </tr>
        <tr>
            <td>Land Deposit</td>
            <td>{{$quotation->land_deposite_percent}}% &nbsp; {{$quotation->land_deposite_price}}</td>
        </tr>
        <tr>
            <td>Building Deposit</td>
            <td>{{$quotation->building_deposite_percent}}% &nbsp; {{$quotation->building_deposite_price}}</td>
        </tr>
    </tbody>
</table>

<h4 class="header-line text-center mt-3">
    <span>Funding & Performance</span>
</h4>
<table class="table">
    <tbody>
        <tr>
            <td>Cash Deposit $</td>
            <td>{{$quotation->cash_deposite}}</td>
        </tr>
        <tr>
            <td>Bank Interest Rate</td>
            <td>{{$quotation->bank_interest_rate}}</td>
        </tr>
        <tr>
            <td>Contingency Allowance as % of the Purchase Price</td>
            <td>{{$quotation->contigency_purchase_price}}</td>
        </tr>
        <tr>
            <td>Capital Growth PA</td>
            <td>{{$quotation->capital_growth_pa}}</td>
        </tr>
    </tbody>
</table>

<h4 class="header-line text-center mt-3">
    <span>Purchase Expense Estimates</span>
</h4>
<table class="table">
    <tbody>
        <tr>
            <td>State</td>
            <td>{{$quotation->state}}</td>
        </tr>
        <tr>
            <td>Stamp Duty</td>
            <td>{{$quotation->stamp_duty}}</td>
        </tr>
        <tr>
            <td>Transaction Costs</td>
            <td>{{$quotation->trans}}</td>
        </tr>
        <tr>
            <td>Solicitor Price</td>
            <td>{{$quotation->soliditor_price}}</td>
        </tr>
        <tr>
            <td>Misc Purchase Cost</td>
            <td>{{$quotation->misc_purchase_cost}}</td>
        </tr>
    </tbody>
</table>

<h4 class="header-line text-center mt-3">
    <span>Timeline Key Dates</span>
</h4>
<table class="table">
    <tbody>
        <tr>
            <td>EOI Dates</td>
            <td>{{$quotation->eoi_date}}</td>
        </tr>
        <tr>
            <td>Unconditional Days Estimates</td>
            <td>{{$quotation->unconditional_days}}</td>
        </tr>
        <tr>
            <td>Titles</td>
            <td>{{$quotation->titles}}</td>
        </tr>
        <tr>
            <td>Estimated Titled Date</td>
            <td>{{$quotation->estimate_titled_date}}</td>
        </tr>
        <tr>
            <td>Settlement Days</td>
            <td>{{$quotation->settlement_days}}</td>
        </tr>
        <tr>
            <td>Estimated Settlement Date</td>
            <td>{{$quotation->estimate_settlement_date}}</td>
        </tr>
        <tr>
            <td>Site Start (weeks)</td>
            <td>{{$quotation->site_start_week}}</td>
        </tr>
        <tr>
            <td>Handover (Amount Due)</td>
            <td>{{$quotation->handover_amount}}</td>
        </tr>
        <tr>
            <td>Handover (Days)</td>
            <td>{{$quotation->handover_days}}</td>
        </tr>
        <tr>
            <td>Total Time (months)</td>
            <td>{{$quotation->total_time_month}}</td>
        </tr>
    </tbody>
</table>

<h4 class="header-line text-center mt-3">
    <span>Payment Milestones</span>
</h4>
<table class="table">
    <tbody>
        <tr>
            <td>Payment Template</td>
            <td>{{$quotation->payment_template}}</td>
        </tr>
    </tbody>
</table>

@endsection
