<?php

namespace App\Filament\Resources\SubCategoryTypes\Pages;

use App\Filament\Resources\SubCategoryTypes\SubCategoryTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubCategoryTypes extends ListRecords
{
    protected static string $resource = SubCategoryTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
