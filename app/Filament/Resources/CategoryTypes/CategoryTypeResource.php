<?php

namespace App\Filament\Resources\CategoryTypes;

use App\Filament\Resources\CategoryTypes\Pages\CreateCategoryType;
use App\Filament\Resources\CategoryTypes\Pages\EditCategoryType;
use App\Filament\Resources\CategoryTypes\Pages\ListCategoryTypes;
use App\Filament\Resources\CategoryTypes\Schemas\CategoryTypeForm;
use App\Filament\Resources\CategoryTypes\Tables\CategoryTypesTable;
use App\Models\CategoryType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryTypeResource extends Resource
{
    protected static ?string $model = CategoryType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Category Type';

    protected static ?int $navigationSort = 7;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Category';

    public static function form(Schema $schema): Schema
    {
        return CategoryTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoryTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategoryTypes::route('/'),
            'create' => CreateCategoryType::route('/create'),
            'edit' => EditCategoryType::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
