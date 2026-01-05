<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListingApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'id' => $this->id,
            'listing_name' => $this->listing_name,
            'listing_date' => $this->listing_date,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'description' => $this->description,
            'issue' => $this->issue,
            'number_of_incident' => $this->number_of_incident,
            'number_of_injuries' => $this->number_of_injuries,
            'number_of_fatalities' => $this->number_of_fatalities,
            'photo' => $this->photo,
            'icon' => $this->icon,

            /** RELATIONS */
            'user' => [
                'id' => $this->user?->id,
                'name' => $this->user?->name,
                'email' => $this->user?->email,
            ],

            'country' => $this->country?->only(['id', 'name']),

            'administrative_level_1' => $this->administrativeLevel1?->only(['id', 'name']),
            'administrative_level_2' => $this->administrativeLevel2?->only(['id', 'name']),
            'administrative_level_3' => $this->administrativeLevel3?->only(['id', 'name']),
            'administrative_level_4' => $this->administrativeLevel4?->only(['id', 'name']),

            'category' => $this->category?->only(['id', 'name']),
            'category_type' => $this->categoryType?->only(['id', 'name']),
            'sub_category_type' => $this->subCategoryType?->only(['id', 'name']),

            'actor' => $this->actor?->only(['id', 'name']),
            'actor_type' => $this->actorType?->only(['id', 'name']),
            'sub_actor_type' => $this->subActorType?->only(['id', 'name']),

            'target' => $this->target?->only(['id', 'name']),
            'target_type' => $this->targetType?->only(['id', 'name']),

            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
