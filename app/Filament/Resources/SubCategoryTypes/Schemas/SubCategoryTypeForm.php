<?php

namespace App\Filament\Resources\SubCategoryTypes\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\CategoryType;

class SubCategoryTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('category_type_id', null)
                     ),

                Select::make('category_type_id')
                    ->label('Category Type')
                    ->options(fn (callable $get) =>
                        CategoryType::where('category_id', $get('category_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required()
                    ->reactive(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Sub Category Type Name'),
            ]);
    }
}
