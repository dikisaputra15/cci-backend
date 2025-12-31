<?php

namespace App\Filament\Resources\SubActorTypes\Pages;

use App\Filament\Resources\SubActorTypes\SubActorTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSubActorType extends EditRecord
{
    protected static string $resource = SubActorTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
