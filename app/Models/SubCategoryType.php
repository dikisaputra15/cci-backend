<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class SubCategoryType extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['category_id', 'category_type_id', 'name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
