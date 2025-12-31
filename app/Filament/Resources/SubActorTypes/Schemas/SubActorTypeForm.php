<?php

namespace App\Filament\Resources\SubActorTypes\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\ActorType;

class SubActorTypeForm
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
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('actor_type_id', null)
                     ),

                Select::make('actor_type_id')
                    ->label('Actor Type')
                    ->options(fn (callable $get) =>
                        ActorType::where('actor_id', $get('actor_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required()
                    ->reactive(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Sub Actor Type Name'),
            ]);
    }
}
