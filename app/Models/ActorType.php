<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActorType extends Model
{
    protected $fillable = ['actor_id', 'name'];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function subActorTypes()
    {
        return $this->hasMany(SubActorType::class);
    }
}
