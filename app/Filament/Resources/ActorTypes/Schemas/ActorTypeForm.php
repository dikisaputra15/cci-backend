<?php

namespace App\Filament\Resources\ActorTypes\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ActorTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('actor_id')
                    ->label('Actor')
                    ->relationship('actor', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Actor Type Name'),
            ]);
    }
}
