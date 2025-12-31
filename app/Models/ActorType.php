<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ActorType extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['actor_id', 'name'];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function subActorTypes()
    {
        return $this->hasMany(SubActorType::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
