<?php

namespace App\Filament\Resources\SubCategoryTypes;

use App\Filament\Resources\SubCategoryTypes\Pages\CreateSubCategoryType;
use App\Filament\Resources\SubCategoryTypes\Pages\EditSubCategoryType;
use App\Filament\Resources\SubCategoryTypes\Pages\ListSubCategoryTypes;
use App\Filament\Resources\SubCategoryTypes\Schemas\SubCategoryTypeForm;
use App\Filament\Resources\SubCategoryTypes\Tables\SubCategoryTypesTable;
use App\Models\SubCategoryType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubCategoryTypeResource extends Resource
{
    protected static ?string $model = SubCategoryType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Sub Category Type';

    protected static ?int $navigationSort = 8;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Category';

    public static function form(Schema $schema): Schema
    {
        return SubCategoryTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubCategoryTypesTable::configure($table);
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
            'index' => ListSubCategoryTypes::route('/'),
            'create' => CreateSubCategoryType::route('/create'),
            'edit' => EditSubCategoryType::route('/{record}/edit'),
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
