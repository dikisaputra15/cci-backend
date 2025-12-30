<?php

namespace App\Filament\Resources\AdministrativeLevel4s\Pages;

use App\Filament\Resources\AdministrativeLevel4s\AdministrativeLevel4Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeLevel4s extends ListRecords
{
    protected static string $resource = AdministrativeLevel4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
