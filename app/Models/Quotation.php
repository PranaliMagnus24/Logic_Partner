<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MasterSetting\App\Models\Contract;
use App\Models\Property;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'quotations';
    protected $fillable = ['is_draft','enquiry_id','summary', 'property','contract_type','land_purchase_cost','building_cost','purchase_price','eoi_deposite_land','eoi_deposite_build','land_deposite_percent','land_deposite_price','building_deposite_percent','building_deposite_price','cash_deposite','bank_interest_rate','contigency_purchase_price','capital_growth_pa','state','stamp_duty','trans','soliditor_price','misc_purchase_cost','eoi_date','unconditional_days','titles','estimate_titled_date','settlement_days','estimate_settlement_date','site_start_week','handover_amount','handover_days','total_time_month','payment_template','template_name','construction_days','template_state','template_eoi_deposite_land','template_eoi_deposite_build','template_land_deposite_percent','template_building_deposite_percent','template_builder','other_one_label','other_one_input',];


    // Quotation.php
public function enquiry()
{
    return $this->belongsTo(Enquiry::class, 'enquiry_id');
}

public function properties()
{
    return $this->belongsTo(Property::class, 'property');

}

public function contractType()
{
    return $this->belongsTo(Contract::class, 'contract_type');

}

}
