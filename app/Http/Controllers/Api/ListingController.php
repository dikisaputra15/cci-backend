<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\ListingApiResource;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::with([
            'user',
            'country',
            'administrativeLevel1',
            'administrativeLevel2',
            'administrativeLevel3',
            'administrativeLevel4',
            'category',
            'categoryType',
            'subCategoryType',
            'actor',
            'actorType',
            'subActorType',
            'target',
            'targetType',
        ])->latest()->get();

        return ListingApiResource::collection($listings);
    }

    public function show(Listing $listing)
    {
        $listing->load([
            'user',
            'country',
            'administrativeLevel1',
            'administrativeLevel2',
            'administrativeLevel3',
            'administrativeLevel4',
            'category',
            'categoryType',
            'subCategoryType',
            'actor',
            'actorType',
            'subActorType',
            'target',
            'targetType',
        ]);

        return new ListingApiResource($listing);
    }
}
