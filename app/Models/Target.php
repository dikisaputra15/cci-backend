<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Target extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['name'];

    public function targetTypes()
    {
        return $this->hasMany(TargetType::class);
    }
}
