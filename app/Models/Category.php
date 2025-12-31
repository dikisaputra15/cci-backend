<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['name'];

    public function categoryTypes()
    {
        return $this->hasMany(CategoryType::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
