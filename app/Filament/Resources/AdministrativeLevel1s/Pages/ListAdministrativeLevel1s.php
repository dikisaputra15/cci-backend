<?php

namespace App\Filament\Resources\AdministrativeLevel1s\Pages;

use App\Filament\Resources\AdministrativeLevel1s\AdministrativeLevel1Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeLevel1s extends ListRecords
{
    protected static string $resource = AdministrativeLevel1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
