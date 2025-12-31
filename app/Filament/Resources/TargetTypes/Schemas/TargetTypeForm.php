<?php

namespace App\Filament\Resources\TargetTypes\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TargetTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('target_id')
                    ->label('Target')
                    ->relationship('target', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Target Type Name'),
            ]);
    }
}
