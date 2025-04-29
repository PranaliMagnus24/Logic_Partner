<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "properties";
    protected $fillable = ['property_id','property_type','status','contract_type','title_type','titled','indicative_package','estimated_date','rent_yield','smsf','addm','approx_weekly_rent','vacancy_rate','land_area','house_area','design','stamp_duty_est','gov_transfer_fee','owners_corp_fee','stage','project_name','prices_from','number_available','area_name','total_population','distance_to_cbd','land_price','house_price','total_price',];


public function propertyImage()
{
    return $this->hasMany(PropertyImage::class, 'properties_id');
}

//Auto Increament Property ID
    protected static function booted()
    {
        static::creating(function ($model) {
            $lastProperty = Property::withTrashed()->orderBy('property_id', 'desc')->first();
            $model->property_id = $lastProperty ? $lastProperty->property_id + 1 : 1001;
        });
    }

}
