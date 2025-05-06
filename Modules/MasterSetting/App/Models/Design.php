<?php

namespace Modules\MasterSetting\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MasterSetting\Database\factories\DesignFactory;

class Design extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'designs';
    protected $fillable = ['design_name', 'status',];


}
