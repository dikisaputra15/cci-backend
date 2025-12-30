<?php

namespace App\Filament\Resources\AdministrativeLevel2s\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\AdministrativeLevel1;

class AdministrativeLevel2Form
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('country_id')
                    ->label('Country')
                    ->relationship('country', 'name')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('administrative_level_1_id', null)
                     ),

                Select::make('administrative_level_1_id')
                    ->label('Administrative Level 1')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel1::where('country_id', $get('country_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required()
                    ->reactive(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Administrative Level 2 Name'),
            ]);
    }
}
