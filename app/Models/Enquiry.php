<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'enquiry';
    protected $fillable = ['project_name','project_location','estimated_budget','estimated_timeline','customer_name','customer_email','customer_phone','customer_address'];
}
