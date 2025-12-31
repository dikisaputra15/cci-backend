<?php

namespace App\Filament\Resources\SubActorTypes\Pages;

use App\Filament\Resources\SubActorTypes\SubActorTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubActorTypes extends ListRecords
{
    protected static string $resource = SubActorTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
