<?php

namespace App\Filament\Resources\AdministrativeLevel1s;

use App\Filament\Resources\AdministrativeLevel1s\Pages\CreateAdministrativeLevel1;
use App\Filament\Resources\AdministrativeLevel1s\Pages\EditAdministrativeLevel1;
use App\Filament\Resources\AdministrativeLevel1s\Pages\ListAdministrativeLevel1s;
use App\Filament\Resources\AdministrativeLevel1s\Schemas\AdministrativeLevel1Form;
use App\Filament\Resources\AdministrativeLevel1s\Tables\AdministrativeLevel1sTable;
use App\Models\AdministrativeLevel1;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdministrativeLevel1Resource extends Resource
{
    protected static ?string $model = AdministrativeLevel1::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Administrative Level 1';

    protected static ?string $pluralModelLabel = 'Administrative Level 1';

    protected static ?int $navigationSort = 2;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Country';

    public static function form(Schema $schema): Schema
    {
        return AdministrativeLevel1Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdministrativeLevel1sTable::configure($table);
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
            'index' => ListAdministrativeLevel1s::route('/'),
            'create' => CreateAdministrativeLevel1::route('/create'),
            'edit' => EditAdministrativeLevel1::route('/{record}/edit'),
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
