<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\QuotationPaymentTable;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Modules\MasterSetting\App\Models\Contract;
use App\Models\Property;

class QuotationManagementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $quotations = Quotation::with('enquiry', 'properties', 'contractType')->orderBy('created_at', 'desc');

            return DataTables::eloquent($quotations)
                ->addIndexColumn()
                ->addColumn('report_name', function($quotation) {
                    return $quotation->enquiry->report_name ?? '-';
                })
                ->addColumn('property_name', function($quotation) {
                    return $quotation->properties->property_name ?? '-';
                })
                // Filter by properties name
                ->filterColumn('property_name', function($query, $keyword) {
                    $query->whereHas('properties', function($q) use ($keyword) {
                        $q->where('property_name', 'like', "%{$keyword}%");
                    });
                })
                ->addColumn('contract_type_name', function($quotation) {
                    return $quotation->contractType->contract_type_name ?? '-';
                })
                // Filter by contractType name
                ->filterColumn('contract_type_name', function($query, $keyword) {
                    $query->whereHas('contractType', function($q) use ($keyword) {
                        $q->where('contract_type_name', 'like', "%{$keyword}%");
                    });
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
                         <a href="'.route('generate.pdf', $quotation->id).'" class="btn btn-warning me-1" onclick="generatePDF({{ $quotation->id }})">  <i class="bi bi-file-earmark-pdf"></i></a>
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
        $contracts = Contract::where('status', 'active')->get();
        $properties = Property::where('status', 'available')->get();
        $countries = Country::get(["name", "id"]);
        $states = State::where('country_id',14)->get(["name", "id"]);
        return view('admin.quotation.create', compact('enquiries', 'countries','states', 'contracts', 'properties'));
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
           'other_one_label' => 'nullable|array',
           'other_one_label.*' => 'nullable|string',
           'other_one_input' => 'nullable|array',
           'other_one_input.*' => 'nullable|string',
           'labels' => 'nullable|array',
           'labels.*' => 'nullable|string',
           'percentages' => 'nullable|array',
           'percentages.*' => 'nullable|string',
           'statuses' => 'nullable|array',
           'statuses.*' => 'nullable|string',
           'template_name' => 'nullable|string',
           'construction_days' => 'nullable|string',
           'template_state' => 'nullable|string',
           'template_eoi_deposite_land' => 'nullable|string',
           'template_eoi_deposite_build' => 'nullable|string',
           'template_land_deposite_percent' => 'nullable|string',
           'template_building_deposite_percent' => 'nullable|string',
           'template_builder' => 'nullable|string',
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
             'other_one_label' => json_encode($request->other_one_label),
             'other_one_input' => json_encode($request->other_one_input),
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
             'template_name' => $request->template_name,
             'construction_days' => $request->construction_days,
             'template_state' => $request->template_state,
             'template_eoi_deposite_land' => $request->template_eoi_deposite_land,
             'template_land_deposite_percent' => $request->template_land_deposite_percent,
             'template_builder' => $request->template_builder,
             'template_eoi_deposite_build' => $request->template_eoi_deposite_build,
             'template_building_deposite_percent' => $request->template_building_deposite_percent,
            'is_draft' => $isDraft,
        ]);

        if ($request->has('labels') && is_array($request->labels)) {
            foreach ($request->labels as $index => $label) {
                QuotationPaymentTable::create([
                    'quotation_id' => $quotation->id,
                    'labels' => $label,
                    'percentages' => $request->percentages[$index] ?? null,
                    'statuses' => $request->statuses[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('list.quotation')->with('success', 'Quotation created successfully');
    }


    public function edit(Request $request, $id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->other_one_label = json_decode($quotation->other_one_label, true);
        $quotation->other_one_input = json_decode($quotation->other_one_input, true);

        $enquiries = Enquiry::all();
        $contracts = Contract::where('status', 'active')->get();
        $properties = Property::where('status', 'available')->get();
        $countries = Country::get(["name", "id"]);
        $states = State::where('country_id', 14)->get(["name", "id"]);
        $paymentTables = QuotationPaymentTable::where('quotation_id', $quotation->id)->get();
        return view('admin.quotation.edit', compact('quotation', 'enquiries', 'countries', 'states', 'paymentTables','contracts', 'properties'));
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
        'other_one_label' => 'nullable|array',
        'other_one_label.*' => 'nullable|string',
        'other_one_input' => 'nullable|array',
        'other_one_input.*' => 'nullable|string',
        'labels' => 'nullable|array',
        'labels.*' => 'nullable|string',
        'percentages' => 'nullable|array',
        'percentages.*' => 'nullable|string',
        'statuses' => 'nullable|array',
        'statuses.*' => 'nullable|string',
        'template_name' => 'nullable|string',
        'construction_days' => 'nullable|string',
        'template_state' => 'nullable|string',
        'template_eoi_deposite_land' => 'nullable|string',
        'template_eoi_deposite_build' => 'nullable|string',
        'template_land_deposite_percent' => 'nullable|string',
        'template_building_deposite_percent' => 'nullable|string',
        'template_builder' => 'nullable|string',
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
        'other_one_label' => json_encode($request->other_one_label),
        'other_one_input' => json_encode($request->other_one_input),
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
        'template_name' => $request->template_name,
        'construction_days' => $request->construction_days,
        'template_state' => $request->template_state,
        'template_eoi_deposite_land' => $request->template_eoi_deposite_land,
        'template_land_deposite_percent' => $request->template_land_deposite_percent,
        'template_builder' => $request->template_builder,
        'template_eoi_deposite_build' => $request->template_eoi_deposite_build,
        'template_building_deposite_percent' => $request->template_building_deposite_percent,
        'is_draft' => $isDraft,
    ]);

    QuotationPaymentTable::where('quotation_id', $quotation->id)->delete();
    foreach ($request->labels as $index => $label) {
        QuotationPaymentTable::create([
            'quotation_id' => $quotation->id,
            'labels' => $label,
            'percentages' => $request->percentages[$index] ?? null,
            'statuses' => $request->statuses[$index] ?? null,
        ]);
    }
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


public function generatePDF($id)
{
    $quotation = Quotation::with('enquiry')->findOrFail($id);

    $pdf = Pdf::loadView('admin.pdf.quotation_pdf', compact('quotation'));

    return $pdf->stream('quotation_' . $quotation->id . '.pdf');
}

public function getStampDuty($stateId)
{
    $data = State::find($stateId);

    if ($data) {
        return response()->json(['stamp_duty' => $data->stamp_duty]);
    }

    return response()->json(['stamp_duty' => null]);
}




}
