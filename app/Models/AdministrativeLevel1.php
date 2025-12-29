<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministrativeLevel1 extends Model
{
    protected $fillable = ['country_id', 'name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function administrativeLevel2s()
    {
        return $this->hasMany(AdministrativeLevel2::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
