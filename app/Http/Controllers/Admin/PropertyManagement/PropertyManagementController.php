<?php

namespace App\Http\Controllers\Admin\PropertyManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImage;
use Yajra\DataTables\Facades\DataTables;
use Str;
use File;
use Illuminate\Support\Facades\DB;
use Modules\MasterSetting\App\Models\Category;
use Modules\MasterSetting\App\Models\Contract;
use Modules\MasterSetting\App\Models\Design;

class PropertyManagementController extends Controller
{
    /////List Property Entries
    public function listProperty(Request $request)
    {
        if ($request->ajax()) {
            $properties = Property::with(['category', 'contract'])->select('properties.*')->orderBy('created_at', 'desc');
            return DataTables::eloquent($properties)
                ->addIndexColumn()
                // Display category name
                ->addColumn('category_name', function($property) {
                    return $property->category->category_name ?? 'N/A';
                })
                // Filter by category name
                ->filterColumn('category_name', function($query, $keyword) {
                    $query->whereHas('category', function($q) use ($keyword) {
                        $q->where('category_name', 'like', "%{$keyword}%");
                    });
                })
                // Display contract type name
                ->addColumn('contract_type_name', function($property) {
                    return $property->contract->contract_type_name ?? 'N/A';
                })
                // Filter by contract type name
                ->filterColumn('contract_type_name', function($query, $keyword) {
                    $query->whereHas('contract', function($q) use ($keyword) {
                        $q->where('contract_type_name', 'like', "%{$keyword}%");
                    });
                })
                // Action buttons
                ->addColumn('action', function($property){
                    return '
                        <div class="d-flex align-items-center nowrap">
                            <a href="'.route('edit.property', $property->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                            <a href="'.route('delete.property', $property->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                            <a href="'.route('show.property', $property->id).'" class="btn btn-primary me-1"><i class="bi bi-eye"></i></a>
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
        $categories = Category::where('status', 'active')->get();
        $contracts = Contract::where('status', 'active')->get();
        $designs = Design::where('status', 'active')->get();
        return view('admin.property_management.property_create', compact('categories','contracts','designs'));
    }


      ////Store Property form
public function storeProperty(Request $request)
{
//dd($request->all());
    $request->validate([
       'property_name' => 'required|string',
        'property_address' => 'required|string',
        'property_description' => 'nullable|string',
        'available_rooms' => 'nullable',
        'available_bathrooms' => 'nullable',
        'available_parking' => 'nullable',
        'property_price' => 'required',
        'status' => 'required',
        'contract_type' => 'required',
        'title_type' => 'nullable|string',
        'titled' => 'nullable|string',
        'indicative_package' => 'nullable|string',
        'estimated_date' => 'nullable|date',
        'rent_yield' => 'nullable',
        'smsf' => 'nullable|string',
        'approx_weekly_rent' => 'nullable',
        'vacancy_rate' => 'nullable',
        'land_area' => 'nullable',
        'house_area' => 'nullable',
        'design' => 'nullable|string',
        'stamp_duty_est' => 'nullable',
        'gov_transfer_fee' => 'nullable',
        'owners_corp_fee' => 'nullable',
        'stage' => 'nullable|string',
        'project_name' => 'required|string',
        'prices_from' => 'nullable',
        'number_available' => 'nullable',
        'area_name' => 'required|string',
        'total_population' => 'nullable',
        'distance_to_cbd' => 'nullable',
        'land_price' => 'nullable',
        'house_price' => 'nullable',
        'total_price' => 'nullable',
        'council_rate' => 'nullable',
        'property_type' => 'required|string',
        'property_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'area_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'project_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'floor_plan_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    DB::beginTransaction();
    $isDraft = $request->submission_type === 'draft' ? 1 : 0;

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
            'council_rate' => $request->council_rate,
            'property_name' => $request->property_name,
            'property_address' => $request->property_address,
            'property_description' => $request->property_description,
            'available_rooms' => $request->available_rooms,
            'available_bathrooms' => $request->available_bathrooms,
            'available_parking' => $request->available_parking,
            'property_price' => $request->property_price,
            'is_draft' => $isDraft,
        ]);

        $multiImageTypes = [
            'property_image' => 'property',
            'area_image' => 'area',
            'project_image' => 'project',
            'floor_plan_image' => 'floor_plan',
            'gallery_image' => 'gallery'
        ];

        foreach ($multiImageTypes as $inputName => $type) {
            if ($request->hasFile($inputName)) {
                foreach ($request->file($inputName) as $image) {
                    $imageName = time().'_'.$type.'_'.uniqid().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('upload/propertyImg/'), $imageName);

                    PropertyImage::create([
                        'properties_id' => $property->id,
                        'image_name' => $imageName,
                        'image_type' => $type,
                        'is_featured' => 0,
                    ]);
                }
            }
        }

        // Handle single feature image
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $imageName = time().'_feature_'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/propertyImg/'), $imageName);

            PropertyImage::create([
                'properties_id' => $property->id,
                'image_name' => $imageName,
                'image_type' => 'feature',
                'is_featured' => 1,
            ]);
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
        $categories = Category::where('status', 'active')->get();
        $contracts = Contract::where('status', 'active')->get();
        $designs = Design::where('status', 'active')->get();
        return view('admin.property_management.property_edit', compact('property','categories','contracts','designs'));
      }

     /////Update Property form
     public function updateProperty(Request $request, $id)
{
    $request->validate([
        'property_name' => 'required|string',
        'property_address' => 'required|string',
        'property_description' => 'nullable|string',
        'available_rooms' => 'nullable|integer',
        'available_bathrooms' => 'nullable|integer',
        'available_parking' => 'nullable|integer',
        'property_price' => 'required',
        'status' => 'required|string',
        'contract_type' => 'required|string',
        'title_type' => 'nullable|string',
        'titled' => 'nullable|string',
        'indicative_package' => 'nullable|string',
        'estimated_date' => 'nullable|date',
        'rent_yield' => 'nullable',
        'smsf' => 'nullable|string',
        'approx_weekly_rent' => 'nullable',
        'vacancy_rate' => 'nullable',
        'land_area' => 'nullable',
        'house_area' => 'nullable',
        'design' => 'nullable|string',
        'stamp_duty_est' => 'nullable',
        'gov_transfer_fee' => 'nullable',
        'owners_corp_fee' => 'nullable',
        'stage' => 'nullable|string',
        'project_name' => 'required|string',
        'prices_from' => 'nullable',
        'number_available' => 'nullable|integer',
        'area_name' => 'required|string',
        'total_population' => 'nullable|integer',
        'distance_to_cbd' => 'nullable',
        'land_price' => 'nullable',
        'house_price' => 'nullable',
        'total_price' => 'nullable',
        'council_rate' => 'nullable',
        'property_type' => 'required|string',
        'property_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'area_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'project_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'floor_plan_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    DB::beginTransaction();
    $isDraft = $request->submission_type === 'draft' ? 1 : 0;

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
            'council_rate' => $request->council_rate,
            'property_name' => $request->property_name,
            'property_address' => $request->property_address,
            'property_description' => $request->property_description,
            'available_rooms' => $request->available_rooms,
            'available_bathrooms' => $request->available_bathrooms,
            'available_parking' => $request->available_parking,
            'property_price' => $request->property_price,
            'is_draft' => $isDraft,
        ]);

        $multiImageTypes = [
            'property_image' => 'property',
            'area_image' => 'area',
            'project_image' => 'project',
            'floor_plan_image' => 'floor_plan',
            'gallery_image' => 'gallery',
        ];

        foreach ($multiImageTypes as $input => $type) {
            if ($request->hasFile($input)) {
                $oldImages = PropertyImage::where('properties_id', $property->id)
                    ->where('image_type', $type)
                    ->get();

                foreach ($oldImages as $old) {
                    $path = public_path('upload/propertyImg/' . $old->image_name);
                    if (file_exists($path)) unlink($path);
                    $old->delete();
                }

                // Save new uploaded images
                foreach ($request->file($input) as $image) {
                    $imageName = time() . '_' . $type . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('upload/propertyImg/'), $imageName);

                    PropertyImage::create([
                        'properties_id' => $property->id,
                        'image_name' => $imageName,
                        'image_type' => $type,
                        'is_featured' => 0,
                    ]);
                }
            }
        }

        // Handle single feature image (replace if exists)
        if ($request->hasFile('feature_image')) {
            $oldFeature = PropertyImage::where('properties_id', $property->id)
                ->where('image_type', 'feature')
                ->first();

            if ($oldFeature) {
                $path = public_path('upload/propertyImg/' . $oldFeature->image_name);
                if (file_exists($path)) unlink($path);
                $oldFeature->delete();
            }

            $image = $request->file('feature_image');
            $imageName = time() . '_feature_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/propertyImg/'), $imageName);

            PropertyImage::create([
                'properties_id' => $property->id,
                'image_name' => $imageName,
                'image_type' => 'feature',
                'is_featured' => 1,
            ]);
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
    DB::beginTransaction();

    try {
        $property = Property::with('propertyImage')->findOrFail($id);
        foreach ($property->propertyImage as $image) {
            $imagePath = public_path('upload/propertyImg/' . $image->image_name);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $property->delete();
        DB::commit();

        return redirect()->route('list.property')->with('success', 'Property and its images deleted successfully!');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}


    /////Preview Property
      public function preview(Request $request)
      {
          $preview = $request->all();
          return view('admin.property_management.preview_property', compact('preview',));
      }

      ////////Display property information
      public function displayProperty($id)
      {
          $property = Property::with('propertyImage', 'category', 'contract')->findOrFail($id);
          return view('admin.property_management.property_display', compact('property'));
      }


      /////Comapre selected entries
      public function compare(Request $request)
      {
        $ids = explode(',', $request->query('ids'));
        $properties = Property::with(['category', 'contract'])
                    ->whereIn('id', $ids)
                    ->get();
        return view('admin.property_management.property_compare', compact('properties'));
    }

    //////////Delete multiple selected entries
    public function bulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!$ids || !is_array($ids)) {
        return response()->json(['message' => 'No properties selected.'], 400);
    }

    try {
        $properties = Property::with('propertyImage')->whereIn('id', $ids)->get();

        foreach ($properties as $property) {
            foreach ($property->propertyImage as $image) {
                $imagePath = public_path('upload/propertyImg/' . $image->image_name);

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                $image->delete();
            }

            $property->delete();
        }

        return response()->json(['message' => 'Selected properties and their images deleted successfully.']);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while deleting.',
            'error' => $e->getMessage()
        ], 500);
    }
}


}
