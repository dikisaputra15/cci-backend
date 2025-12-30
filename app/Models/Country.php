<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory, Softdeletes;

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
