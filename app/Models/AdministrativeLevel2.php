<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministrativeLevel2 extends Model
{
    protected $fillable = ['country_id', 'administrative_level_1_id', 'name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function administrativeLevel1()
    {
        return $this->belongsTo(AdministrativeLevel1::class);
    }

    public function administrativeLevel3s()
    {
        return $this->hasMany(AdministrativeLevel3::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
