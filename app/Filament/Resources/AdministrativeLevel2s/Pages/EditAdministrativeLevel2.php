<?php

namespace App\Filament\Resources\AdministrativeLevel2s\Pages;

use App\Filament\Resources\AdministrativeLevel2s\AdministrativeLevel2Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAdministrativeLevel2 extends EditRecord
{
    protected static string $resource = AdministrativeLevel2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
