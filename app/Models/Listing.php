<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function administrativeLevel1()
    {
        return $this->belongsTo(AdministrativeLevel1::class);
    }

    public function administrativeLevel2()
    {
        return $this->belongsTo(AdministrativeLevel2::class);
    }

    public function administrativeLevel3()
    {
        return $this->belongsTo(AdministrativeLevel3::class);
    }

    public function administrativeLevel4()
    {
        return $this->belongsTo(AdministrativeLevel4::class);
    }

    public function subCategoryType()
    {
        return $this->belongsTo(SubCategoryType::class);
    }

    public function subActorType()
    {
        return $this->belongsTo(SubActorType::class);
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
