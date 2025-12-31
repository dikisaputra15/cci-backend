<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CategoryType extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategoryTypes()
    {
        return $this->hasMany(SubCategoryType::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
