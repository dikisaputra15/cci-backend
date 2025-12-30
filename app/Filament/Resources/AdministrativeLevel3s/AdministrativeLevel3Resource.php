<?php

namespace App\Filament\Resources\AdministrativeLevel3s;

use App\Filament\Resources\AdministrativeLevel3s\Pages\CreateAdministrativeLevel3;
use App\Filament\Resources\AdministrativeLevel3s\Pages\EditAdministrativeLevel3;
use App\Filament\Resources\AdministrativeLevel3s\Pages\ListAdministrativeLevel3s;
use App\Filament\Resources\AdministrativeLevel3s\Schemas\AdministrativeLevel3Form;
use App\Filament\Resources\AdministrativeLevel3s\Tables\AdministrativeLevel3sTable;
use App\Models\AdministrativeLevel3;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdministrativeLevel3Resource extends Resource
{
    protected static ?string $model = AdministrativeLevel3::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Administrative Level 3';

    protected static ?string $pluralModelLabel = 'Administrative Level 3';

    protected static ?int $navigationSort = 4;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Country';

    public static function form(Schema $schema): Schema
    {
        return AdministrativeLevel3Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdministrativeLevel3sTable::configure($table);
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
            'index' => ListAdministrativeLevel3s::route('/'),
            'create' => CreateAdministrativeLevel3::route('/create'),
            'edit' => EditAdministrativeLevel3::route('/{record}/edit'),
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
