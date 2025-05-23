<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = "states";
    protected $fillable = ['name','country_id','country_code','fips_code','iso2','type','latitude','longitude','flag','wikiDataId','stamp_duty'];

    public function country()
{
    return $this->belongsTo(Country::class, 'country_id');
}

}
