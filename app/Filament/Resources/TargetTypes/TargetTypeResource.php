<?php

namespace App\Filament\Resources\TargetTypes;

use App\Filament\Resources\TargetTypes\Pages\CreateTargetType;
use App\Filament\Resources\TargetTypes\Pages\EditTargetType;
use App\Filament\Resources\TargetTypes\Pages\ListTargetTypes;
use App\Filament\Resources\TargetTypes\Schemas\TargetTypeForm;
use App\Filament\Resources\TargetTypes\Tables\TargetTypesTable;
use App\Models\TargetType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TargetTypeResource extends Resource
{
    protected static ?string $model = TargetType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?int $navigationSort = 13;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Target';

    protected static ?string $recordTitleAttribute = 'Target Type';

    public static function form(Schema $schema): Schema
    {
        return TargetTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TargetTypesTable::configure($table);
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
            'index' => ListTargetTypes::route('/'),
            'create' => CreateTargetType::route('/create'),
            'edit' => EditTargetType::route('/{record}/edit'),
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
