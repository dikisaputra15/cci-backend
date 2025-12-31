<?php

namespace App\Filament\Resources\SubActorTypes;

use App\Filament\Resources\SubActorTypes\Pages\CreateSubActorType;
use App\Filament\Resources\SubActorTypes\Pages\EditSubActorType;
use App\Filament\Resources\SubActorTypes\Pages\ListSubActorTypes;
use App\Filament\Resources\SubActorTypes\Schemas\SubActorTypeForm;
use App\Filament\Resources\SubActorTypes\Tables\SubActorTypesTable;
use App\Models\SubActorType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubActorTypeResource extends Resource
{
    protected static ?string $model = SubActorType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 11;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Actor';

    protected static ?string $recordTitleAttribute = 'Sub Actor Type';

    public static function form(Schema $schema): Schema
    {
        return SubActorTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubActorTypesTable::configure($table);
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
            'index' => ListSubActorTypes::route('/'),
            'create' => CreateSubActorType::route('/create'),
            'edit' => EditSubActorType::route('/{record}/edit'),
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
