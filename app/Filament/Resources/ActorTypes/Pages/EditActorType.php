<?php

namespace App\Filament\Resources\ActorTypes\Pages;

use App\Filament\Resources\ActorTypes\ActorTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditActorType extends EditRecord
{
    protected static string $resource = ActorTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
