<?php

namespace App\Filament\Resources\AdministrativeLevel2s\Pages;

use App\Filament\Resources\AdministrativeLevel2s\AdministrativeLevel2Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeLevel2s extends ListRecords
{
    protected static string $resource = AdministrativeLevel2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
