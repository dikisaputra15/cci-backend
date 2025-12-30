<?php

namespace App\Filament\Resources\AdministrativeLevel3s\Pages;

use App\Filament\Resources\AdministrativeLevel3s\AdministrativeLevel3Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeLevel3s extends ListRecords
{
    protected static string $resource = AdministrativeLevel3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
