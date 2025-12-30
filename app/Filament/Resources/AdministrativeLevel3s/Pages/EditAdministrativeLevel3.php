<?php

namespace App\Filament\Resources\AdministrativeLevel3s\Pages;

use App\Filament\Resources\AdministrativeLevel3s\AdministrativeLevel3Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAdministrativeLevel3 extends EditRecord
{
    protected static string $resource = AdministrativeLevel3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
