<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TargetType extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['target_id', 'name'];

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
