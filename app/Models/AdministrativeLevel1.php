<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class AdministrativeLevel1 extends Model
{
    use HasFactory, Softdeletes;

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
