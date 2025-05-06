<?php

namespace Modules\MasterSetting\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MasterSetting\Database\factories\ContractFactory;
use App\Models\Quotation;


class Contract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'contracts';
    protected $fillable = ['contract_type_name', 'status',];

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }


}
