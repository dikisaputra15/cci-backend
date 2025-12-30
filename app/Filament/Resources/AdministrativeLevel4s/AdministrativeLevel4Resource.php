<?php

namespace App\Filament\Resources\AdministrativeLevel4s;

use App\Filament\Resources\AdministrativeLevel4s\Pages\CreateAdministrativeLevel4;
use App\Filament\Resources\AdministrativeLevel4s\Pages\EditAdministrativeLevel4;
use App\Filament\Resources\AdministrativeLevel4s\Pages\ListAdministrativeLevel4s;
use App\Filament\Resources\AdministrativeLevel4s\Schemas\AdministrativeLevel4Form;
use App\Filament\Resources\AdministrativeLevel4s\Tables\AdministrativeLevel4sTable;
use App\Models\AdministrativeLevel4;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdministrativeLevel4Resource extends Resource
{
    protected static ?string $model = AdministrativeLevel4::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Administrative Level 4';

    protected static ?string $pluralModelLabel = 'Administrative Level 4';

    protected static ?int $navigationSort = 5;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Country';

    public static function form(Schema $schema): Schema
    {
        return AdministrativeLevel4Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdministrativeLevel4sTable::configure($table);
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
            'index' => ListAdministrativeLevel4s::route('/'),
            'create' => CreateAdministrativeLevel4::route('/create'),
            'edit' => EditAdministrativeLevel4::route('/{record}/edit'),
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
