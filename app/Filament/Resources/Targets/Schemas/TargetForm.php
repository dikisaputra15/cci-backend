<?php

namespace App\Filament\Resources\Targets\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class TargetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
