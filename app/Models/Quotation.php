<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'quotations';
    protected $fillable = ['enquiry_id','project_name','project_location','build_up_area','num_floors','labor_cost','material_cost','equipment_cost','misc_expenses','total_cost','start_date','completion_date','status','approval','created_by','approved_by','extra_costs'];


    // Quotation.php
public function enquiry()
{
    return $this->belongsTo(Enquiry::class, 'enquiry_id');
}

}
