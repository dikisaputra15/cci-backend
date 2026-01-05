<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Listing extends Model
{
    use HasFactory, Softdeletes;

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function administrativeLevel1()
    {
        return $this->belongsTo(AdministrativeLevel1::class, 'administrative_level_1_id');
    }

    public function administrativeLevel2()
    {
        return $this->belongsTo(AdministrativeLevel2::class, 'administrative_level_2_id');
    }

    public function administrativeLevel3()
    {
        return $this->belongsTo(AdministrativeLevel3::class, 'administrative_level_3_id');
    }

    public function administrativeLevel4()
    {
        return $this->belongsTo(AdministrativeLevel4::class, 'administrative_level_4_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function subCategoryType()
    {
        return $this->belongsTo(SubCategoryType::class);
    }

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function actorType()
    {
        return $this->belongsTo(ActorType::class, 'actor_type_id');
    }

    public function subActorType()
    {
        return $this->belongsTo(SubActorType::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function targetType()
    {
        return $this->belongsTo(TargetType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
