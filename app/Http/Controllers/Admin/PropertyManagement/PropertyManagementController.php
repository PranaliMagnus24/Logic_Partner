<?php

namespace App\Http\Controllers\Admin\PropertyManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImage;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Illuminate\Support\Facades\DB;

class PropertyManagementController extends Controller
{
    /////List Property Entries
    public function listProperty(Request $request)
    {
        if ($request->ajax()) {
            $properties = Property::orderBy('created_at', 'desc');
            return DataTables::eloquent($properties)
                ->addIndexColumn()
                ->addColumn('action', function($property){
                    return '
                     <div class="d-flex align-items-center nowrap">
                        <a href="'.route('edit.property', $property->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                        <a href="'.route('delete.property', $property->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.property_management.property_list');
    }

    ///Create Property Form
      public function createProperty()
      {
        return view('admin.property_management.property_create');
      }

      ////Store Property form
public function storeProperty(Request $request)
{

    $request->validate([
        'property_type' => 'required|string',
        'project_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'area_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    DB::beginTransaction();

    try {
        $property = Property::create([
            'property_type' => $request->property_type,
            'status' => $request->status,
            'contract_type' => $request->contract_type,
            'title_type' => $request->title_type,
            'titled' => $request->titled,
            'indicative_package' => $request->indicative_package,
            'estimated_date' => $request->estimated_date,
            'rent_yield' => $request->rent_yield,
            'smsf' => $request->smsf,
            'addm' => $request->addm,
            'approx_weekly_rent' => $request->approx_weekly_rent,
            'vacancy_rate' => $request->vacancy_rate,
            'land_area' => $request->land_area,
            'house_area' => $request->house_area,
            'design' => $request->design,
            'stamp_duty_est' => $request->stamp_duty_est,
            'gov_transfer_fee' => $request->gov_transfer_fee,
            'owners_corp_fee' => $request->owners_corp_fee,
            'stage' => $request->stage,
            'project_name' => $request->project_name,
            'prices_from' => $request->prices_from,
            'number_available' => $request->number_available,
            'area_name' => $request->area_name,
            'total_population' => $request->total_population,
            'distance_to_cbd' => $request->distance_to_cbd,
            'land_price' => $request->land_price,
            'house_price' => $request->house_price,
            'total_price' => $request->total_price,
        ]);

        // Upload project images
        if ($request->hasFile('project_image')) {
            foreach ($request->file('project_image') as $file) {
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/project_images/'), $filename);

                PropertyImage::create([
                    'properties_id' => $property->id,
                    'project_image' => $filename,
                ]);
            }
        }

        // Upload area images
        if ($request->hasFile('area_image')) {
            foreach ($request->file('area_image') as $file) {
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/area_images/'), $filename);

                PropertyImage::create([
                    'properties_id' => $property->id,
                    'area_image' => $filename,
                ]);
            }
        }

        DB::commit();
        return redirect()->route('list.property')->with('success', 'Property Created Successfully!');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}


      /////Edit Property form
      public function editProperty($id)
      {
        $property = Property::with('propertyImage')->findOrFail($id);
        return view('admin.property_management.property_edit', compact('property'));
      }

     /////Update Property form
     public function updateProperty(Request $request, $id)
{
    $request->validate([
        'property_type' => 'required|string',
        'project_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'area_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    DB::beginTransaction();

    try {
        $property = Property::findOrFail($id);

        $property->update([
            'property_type' => $request->property_type,
            'status' => $request->status,
            'contract_type' => $request->contract_type,
            'title_type' => $request->title_type,
            'titled' => $request->titled,
            'indicative_package' => $request->indicative_package,
            'estimated_date' => $request->estimated_date,
            'rent_yield' => $request->rent_yield,
            'smsf' => $request->smsf,
            'addm' => $request->addm,
            'approx_weekly_rent' => $request->approx_weekly_rent,
            'vacancy_rate' => $request->vacancy_rate,
            'land_area' => $request->land_area,
            'house_area' => $request->house_area,
            'design' => $request->design,
            'stamp_duty_est' => $request->stamp_duty_est,
            'gov_transfer_fee' => $request->gov_transfer_fee,
            'owners_corp_fee' => $request->owners_corp_fee,
            'stage' => $request->stage,
            'project_name' => $request->project_name,
            'prices_from' => $request->prices_from,
            'number_available' => $request->number_available,
            'area_name' => $request->area_name,
            'total_population' => $request->total_population,
            'distance_to_cbd' => $request->distance_to_cbd,
            'land_price' => $request->land_price,
            'house_price' => $request->house_price,
            'total_price' => $request->total_price,
        ]);

        // Upload new project images
        if ($request->hasFile('project_image')) {
            foreach ($request->file('project_image') as $file) {
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/project_images/'), $filename);

                PropertyImage::create([
                    'properties_id' => $property->id,
                    'project_image' => $filename,
                ]);
            }
        }

        // Upload new area images
        if ($request->hasFile('area_image')) {
            foreach ($request->file('area_image') as $file) {
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/area_images/'), $filename);

                PropertyImage::create([
                    'properties_id' => $property->id,
                    'area_image' => $filename,
                ]);
            }
        }

        DB::commit();
        return redirect()->route('list.property')->with('success', 'Property Updated Successfully!');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}


      /////Delete Property
      public function destroyProperty($id)
      {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->route('list.property')->with('success','Property Deleted Successfully!');

      }
}
