<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubActorType extends Model
{
    protected $fillable = ['actor_type_id', 'name'];

    public function actorType()
    {
        return $this->belongsTo(ActorType::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
