<?php

namespace Modules\FAQ\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\FAQ\Database\factories\FAQFactory;

class FAQ extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "faqs";
    protected $fillable = ['question','answer','status'];

    protected static function newFactory(): FAQFactory
    {
        //return FAQFactory::new();
    }
}
