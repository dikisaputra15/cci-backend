<?php

namespace App\Filament\Resources\CategoryTypes\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class CategoryTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('Category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Category Type Name'),
            ]);
    }
}
