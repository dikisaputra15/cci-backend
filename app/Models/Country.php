<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    public function administrativeLevel1s()
    {
        return $this->hasMany(AdministrativeLevel1::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
