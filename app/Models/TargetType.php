<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetType extends Model
{
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
