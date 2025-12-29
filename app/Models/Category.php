<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
