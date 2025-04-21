<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'enquiry';
    protected $fillable = ['assign_to','project_name','project_location','estimated_budget','estimated_timeline', 'customer_name', 'second_customer_name', 'enquiry_name','stage','status','follow_up_date', 'follow_up_time','report_name','current_stage_date','created_date','enquiry_type','enquiry_source','best_time_to_call', 'is_draft','attachments',];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function quotations()
{
    return $this->hasMany(Quotation::class);
}

}
