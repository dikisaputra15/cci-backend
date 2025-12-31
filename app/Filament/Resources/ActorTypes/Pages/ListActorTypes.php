<?php

namespace App\Filament\Resources\ActorTypes\Pages;

use App\Filament\Resources\ActorTypes\ActorTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActorTypes extends ListRecords
{
    protected static string $resource = ActorTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
