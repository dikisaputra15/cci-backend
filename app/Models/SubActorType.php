<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class SubActorType extends Model
{
    use HasFactory, Softdeletes;

    protected $fillable = ['actor_id', 'actor_type_id', 'name'];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function actorType()
    {
        return $this->belongsTo(ActorType::class, 'actor_type_id');
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
