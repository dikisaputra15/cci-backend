<?php

namespace App\Filament\Resources\SubCategoryTypes\Pages;

use App\Filament\Resources\SubCategoryTypes\SubCategoryTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSubCategoryType extends EditRecord
{
    protected static string $resource = SubCategoryTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
