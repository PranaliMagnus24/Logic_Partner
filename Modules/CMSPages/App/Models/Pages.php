<?php

namespace Modules\CMSPages\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CMSPages\Database\factories\PagesFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'pages';
    protected $fillable = ['title','summary','description','image','meta_title','meta_keyword','meta_description','og_title','og_description','og_img','status'];

    protected static function newFactory(): PagesFactory
    {
        //return PagesFactory::new();
    }
}
