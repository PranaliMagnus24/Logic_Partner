<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PropertyImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'properties_image';
    protected $fillable = ['properties_id','image_name','image_type','is_featured',];



    public function property()
{
    return $this->belongsTo(Property::class, 'properties_id');
}


}
