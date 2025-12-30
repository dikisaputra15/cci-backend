<?php

namespace App\Filament\Resources\AdministrativeLevel3s\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\AdministrativeLevel1;
use App\Models\AdministrativeLevel2;

class AdministrativeLevel3Form
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
                    ->afterStateUpdated(function (callable $set) {
                        $set('administrative_level_1_id', null);
                        $set('administrative_level_2_id', null);
                    }),

                Select::make('administrative_level_1_id')
                    ->label('Administrative Level 1')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel1::where('country_id', $get('country_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('administrative_level_2_id', null)
                    ),

                Select::make('administrative_level_2_id')
                    ->label('Administrative Level 2')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel2::where('administrative_level_1_id', $get('administrative_level_1_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required()
                    ->reactive(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Administrative Level 3 Name'),
            ]);
    }
}
