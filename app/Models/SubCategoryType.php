<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryType extends Model
{
    protected $fillable = ['category_type_id', 'name'];

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class);
    }
}
