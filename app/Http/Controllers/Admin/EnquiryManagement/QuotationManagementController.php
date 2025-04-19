<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Enquiry;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Str;

class QuotationManagementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $quotations = Quotation::with('enquiry');

            return DataTables::eloquent($quotations)
                ->addIndexColumn()
                ->addColumn('report_name', function($quotation) {
                    return $quotation->enquiry->report_name ?? '-';
                })
                ->addColumn('action', function($quotation){
                    return '
                     <div class="d-flex align-items-center nowrap">
                        <a href="'.route('edit.quotation', $quotation->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                        <div class="dropdown">
                        <a class="icon btn btn-secondary me-1" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item view-quotation" href="#" data-id="'.$quotation->id.'">View Quotation</a></li>
                        </ul>
                        </div>
                        <a href="'.route('delete.quotation', $quotation->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view("admin.quotation.index");
    }

    public function create(Request $request)
    {
        $enquiries = Enquiry::all();
        return view('admin.quotation.create', compact('enquiries'));
    }


    public function store(Request $request)
    {

        $request->validate([
           'enquiry_id' => 'required|string',
           'summary' => 'nullable|string',
           'property' => 'required|string',
           'contract_type' => 'required|string',
           'land_purchase_cost' => 'required|string',
           'building_cost' => 'required|string',
           'purchase_price' => 'required|string',
           'eoi_deposite_land' => 'required|string',
           'eoi_deposite_build' => 'required|string',
           'land_deposite_percent' => 'required|string',
           'land_deposite_price' => 'required|string',
           'building_deposite_percent' => 'required|string',
           'building_deposite_price' => 'required|string',
           'cash_deposite' => 'required|string',
           'bank_interest_rate' => 'required|string',
           'contigency_purchase_price' => 'required|string',
           'capital_growth_pa' => 'required|string',
           'state' => 'nullable|string',
           'stamp_duty' => 'required|string',
           'trans' => 'required|string',
           'soliditor_price' => 'required|string',
           'misc_purchase_cost' => 'required|string',
           'eoi_date' => 'required|date',
           'unconditional_days' => 'required|string',
           'titles' => 'required|string',
           'estimate_titled_date' => 'required|date',
           'settlement_days' => 'required|string',
           'estimate_settlement_date' => 'required|date',
           'site_start_week' => 'required|string',
           'handover_amount' => 'required|string',
           'handover_days' => 'required|string',
           'total_time_month' => 'required|string',
           'payment_template' => 'nullable|string',
        ]);

        $isDraft = $request->submission_type === 'draft' ? 1 : 0;

        $quotation = Quotation::create([
            'enquiry_id' => $request->enquiry_id,
            'summary' => $request->summary,
            'property' => $request->property,
            'contract_type' => $request->contract_type,
            'land_purchase_cost' => $request->land_purchase_cost,
            'building_cost' => $request->building_cost,
            'purchase_price' => $request->purchase_price,
            'eoi_deposite_land' => $request->eoi_deposite_land,
            'eoi_deposite_build' => $request->eoi_deposite_build,
            'land_deposite_percent' => $request->land_deposite_percent,
            'land_deposite_price' => $request->land_deposite_price,
            'building_deposite_percent' => $request->building_deposite_percent,
            'building_deposite_price' => $request->building_deposite_price,
            'cash_deposite' => $request->cash_deposite,
            'bank_interest_rate' => $request->bank_interest_rate,
            'contigency_purchase_price' => $request->contigency_purchase_price,
            'capital_growth_pa' => $request->capital_growth_pa,
             'state' => $request->state,
             'stamp_duty' => $request->stamp_duty,
             'trans' => $request->trans,
             'soliditor_price' => $request->soliditor_price,
             'misc_purchase_cost' => $request->misc_purchase_cost,
             'eoi_date' => $request->eoi_date,
             'unconditional_days' => $request->unconditional_days,
             'titles' => $request->titles,
             'estimate_titled_date' => $request->estimate_titled_date,
             'settlement_days' => $request->settlement_days,
             'estimate_settlement_date' => $request->estimate_settlement_date,
             'site_start_week' => $request->site_start_week,
             'handover_amount' => $request->handover_amount,
             'handover_days' => $request->handover_days,
             'total_time_month' => $request->total_time_month,
             'payment_template' => $request->payment_template,
            'is_draft' => $isDraft,
        ]);
        return redirect()->route('list.quotation')->with('success', 'Quotation created successfully');
    }


    public function edit(Request $request, $id)
    {
        $quotation = Quotation::findOrFail($id);
        $enquiries = Enquiry::all();
        return view('admin.quotation.edit', compact('quotation', 'enquiries'));
    }


    public function update(Request $request, $id)
{
    $quotation = Quotation::findOrFail($id);

    $request->validate([
        'enquiry_id' => 'required|string',
        'summary' => 'nullable|string',
        'property' => 'required|string',
        'contract_type' => 'required|string',
        'land_purchase_cost' => 'required|string',
        'building_cost' => 'required|string',
        'purchase_price' => 'required|string',
        'eoi_deposite_land' => 'required|string',
        'eoi_deposite_build' => 'required|string',
        'land_deposite_percent' => 'required|string',
        'land_deposite_price' => 'required|string',
        'building_deposite_percent' => 'required|string',
        'building_deposite_price' => 'required|string',
        'cash_deposite' => 'required|string',
        'bank_interest_rate' => 'required|string',
        'contigency_purchase_price' => 'required|string',
        'capital_growth_pa' => 'required|string',
        'state' => 'nullable|string',
        'stamp_duty' => 'required|string',
        'trans' => 'required|string',
        'soliditor_price' => 'required|string',
        'misc_purchase_cost' => 'required|string',
        'eoi_date' => 'required|date',
        'unconditional_days' => 'required|string',
        'titles' => 'required|string',
        'estimate_titled_date' => 'required|date',
        'settlement_days' => 'required|string',
        'estimate_settlement_date' => 'required|date',
        'site_start_week' => 'required|string',
        'handover_amount' => 'required|string',
        'handover_days' => 'required|string',
        'total_time_month' => 'required|string',
        'payment_template' => 'nullable|string',
    ]);

    $isDraft = $request->submission_type === 'draft' ? 1 : 0;

    $quotation->update([
        'enquiry_id' => $request->enquiry_id,
        'summary' => $request->summary,
        'property' => $request->property,
        'contract_type' => $request->contract_type,
        'land_purchase_cost' => $request->land_purchase_cost,
        'building_cost' => $request->building_cost,
        'purchase_price' => $request->purchase_price,
        'eoi_deposite_land' => $request->eoi_deposite_land,
        'eoi_deposite_build' => $request->eoi_deposite_build,
        'land_deposite_percent' => $request->land_deposite_percent,
        'land_deposite_price' => $request->land_deposite_price,
        'building_deposite_percent' => $request->building_deposite_percent,
        'building_deposite_price' => $request->building_deposite_price,
        'cash_deposite' => $request->cash_deposite,
        'bank_interest_rate' => $request->bank_interest_rate,
        'contigency_purchase_price' => $request->contigency_purchase_price,
        'capital_growth_pa' => $request->capital_growth_pa,
        'state' => $request->state,
        'stamp_duty' => $request->stamp_duty,
        'trans' => $request->trans,
        'soliditor_price' => $request->soliditor_price,
        'misc_purchase_cost' => $request->misc_purchase_cost,
        'eoi_date' => $request->eoi_date,
        'unconditional_days' => $request->unconditional_days,
        'titles' => $request->titles,
        'estimate_titled_date' => $request->estimate_titled_date,
        'settlement_days' => $request->settlement_days,
        'estimate_settlement_date' => $request->estimate_settlement_date,
        'site_start_week' => $request->site_start_week,
        'handover_amount' => $request->handover_amount,
        'handover_days' => $request->handover_days,
        'total_time_month' => $request->total_time_month,
        'payment_template' => $request->payment_template,
        'is_draft' => $isDraft,
    ]);

    return redirect()->route('list.quotation')->with('success', 'Quotation updated successfully');
}



    public function destroy($id){
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();
        return redirect()->route('list.quotation')->with('success','Quotation deleted successfully');
    }


    public function show($id)
    {
        $quotation = Quotation::with('enquiry')->findOrFail($id);
        return response()->json([
            'html' => view('admin.quotation.view_quotation', compact('quotation'))->render()
        ]);
    }


    public function preview(Request $request)
{
    $data = $request->all();
    return view('admin.quotation.preview_quotation', compact('data',));
}




}
