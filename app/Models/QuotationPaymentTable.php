<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationPaymentTable extends Model
{
    use HasFactory;
    protected $table = "quotation_payments_table";
    protected $fillable = ['quotation_id','labels','percentages','statuses'];
}
