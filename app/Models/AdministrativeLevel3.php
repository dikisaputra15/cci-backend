<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministrativeLevel3 extends Model
{
     protected $fillable = [
        'country_id',
        'administrative_level_1_id',
        'administrative_level_2_id',
        'name'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function administrativeLevel1()
    {
        return $this->belongsTo(AdministrativeLevel1::class);
    }

    public function administrativeLevel2()
    {
        return $this->belongsTo(AdministrativeLevel2::class);
    }

    public function administrativeLevel4s()
    {
        return $this->hasMany(AdministrativeLevel4::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
