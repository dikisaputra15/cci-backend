<?php

namespace App\Filament\Resources\ActorTypes;

use App\Filament\Resources\ActorTypes\Pages\CreateActorType;
use App\Filament\Resources\ActorTypes\Pages\EditActorType;
use App\Filament\Resources\ActorTypes\Pages\ListActorTypes;
use App\Filament\Resources\ActorTypes\Schemas\ActorTypeForm;
use App\Filament\Resources\ActorTypes\Tables\ActorTypesTable;
use App\Models\ActorType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActorTypeResource extends Resource
{
    protected static ?string $model = ActorType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 10;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Actor';

    protected static ?string $recordTitleAttribute = 'Actor Type';

    public static function form(Schema $schema): Schema
    {
        return ActorTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActorTypesTable::configure($table);
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
            'index' => ListActorTypes::route('/'),
            'create' => CreateActorType::route('/create'),
            'edit' => EditActorType::route('/{record}/edit'),
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
