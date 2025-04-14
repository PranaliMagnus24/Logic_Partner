<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'enquiry';
    protected $fillable = ['assign_to','project_name','project_location','estimated_budget','estimated_timeline','customer_name','customer_email','customer_phone','customer_address'];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
