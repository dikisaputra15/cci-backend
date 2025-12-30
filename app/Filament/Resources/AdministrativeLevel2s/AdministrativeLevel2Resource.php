<?php

namespace App\Filament\Resources\AdministrativeLevel2s;

use App\Filament\Resources\AdministrativeLevel2s\Pages\CreateAdministrativeLevel2;
use App\Filament\Resources\AdministrativeLevel2s\Pages\EditAdministrativeLevel2;
use App\Filament\Resources\AdministrativeLevel2s\Pages\ListAdministrativeLevel2s;
use App\Filament\Resources\AdministrativeLevel2s\Schemas\AdministrativeLevel2Form;
use App\Filament\Resources\AdministrativeLevel2s\Tables\AdministrativeLevel2sTable;
use App\Models\AdministrativeLevel2;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdministrativeLevel2Resource extends Resource
{
    protected static ?string $model = AdministrativeLevel2::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Administrative Level 2';

    protected static ?string $pluralModelLabel = 'Administrative Level 2';

    protected static ?int $navigationSort = 3;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Country';

    public static function form(Schema $schema): Schema
    {
        return AdministrativeLevel2Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdministrativeLevel2sTable::configure($table);
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
            'index' => ListAdministrativeLevel2s::route('/'),
            'create' => CreateAdministrativeLevel2::route('/create'),
            'edit' => EditAdministrativeLevel2::route('/{record}/edit'),
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
