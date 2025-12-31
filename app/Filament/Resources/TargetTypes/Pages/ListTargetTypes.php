<?php

namespace App\Filament\Resources\TargetTypes\Pages;

use App\Filament\Resources\TargetTypes\TargetTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTargetTypes extends ListRecords
{
    protected static string $resource = TargetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
