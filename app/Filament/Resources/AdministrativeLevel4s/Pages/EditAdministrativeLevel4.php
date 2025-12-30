<?php

namespace App\Filament\Resources\AdministrativeLevel4s\Pages;

use App\Filament\Resources\AdministrativeLevel4s\AdministrativeLevel4Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAdministrativeLevel4 extends EditRecord
{
    protected static string $resource = AdministrativeLevel4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
