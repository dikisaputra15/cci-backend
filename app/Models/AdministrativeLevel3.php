<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class AdministrativeLevel3 extends Model
{
     use HasFactory, Softdeletes;

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
        return $this->belongsTo(AdministrativeLevel1::class, 'administrative_level_1_id');
    }

    public function administrativeLevel2()
    {
        return $this->belongsTo(AdministrativeLevel2::class, 'administrative_level_2_id');
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
