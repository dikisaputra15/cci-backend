<?php

namespace App\Filament\Resources\TargetTypes\Pages;

use App\Filament\Resources\TargetTypes\TargetTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditTargetType extends EditRecord
{
    protected static string $resource = TargetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
