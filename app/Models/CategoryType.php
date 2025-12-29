<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategoryTypes()
    {
        return $this->hasMany(SubCategoryType::class);
    }
}
