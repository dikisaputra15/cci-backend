<?php

namespace App\Filament\Resources\Listings\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\AdministrativeLevel1;
use App\Models\AdministrativeLevel2;
use App\Models\AdministrativeLevel3;
use App\Models\AdministrativeLevel4;
use App\Models\CategoryType;
use App\Models\SubCategoryType;
use App\Models\ActorType;
use App\Models\SubActorType;
use App\Models\TargetType;
use Illuminate\Support\HtmlString;
use Filament\Actions\Action;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Http;

class ListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('listing_name')
                    ->required()
                    ->columnSpanFull()
                    ->label('Title'),

                DateTimePicker::make('listing_date')
                    ->required()
                    ->columnSpanFull()
                    ->label('Incident Date'),

                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->columnSpanFull()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('category_type_id', null)
                     ),

                Select::make('category_type_id')
                    ->label('Category Type')
                    ->options(fn (callable $get) =>
                        CategoryType::where('category_id', $get('category_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

                Select::make('sub_category_type_id')
                    ->label('Sub Category Type')
                    ->options(fn (callable $get) =>
                        SubCategoryType::where('category_type_id', $get('category_type_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

                Select::make('actor_id')
                    ->label('Actor')
                    ->relationship('actor', 'name')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->columnSpanFull()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('actor_type_id', null)
                     ),

                Select::make('actor_type_id')
                    ->label('Actor Type')
                    ->options(fn (callable $get) =>
                        ActorType::where('actor_id', $get('actor_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

                Select::make('sub_actor_type_id')
                    ->label('Sub Actor Type')
                    ->options(fn (callable $get) =>
                        SubActorType::where('actor_type_id', $get('actor_type_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

                Select::make('target_id')
                    ->label('Target')
                    ->relationship('target', 'name')
                    ->searchable()
                    ->columnSpanFull()
                    ->preload(),

                Select::make('target_type_id')
                    ->label('Target Type')
                    ->options(fn (callable $get) =>
                        TargetType::where('target_id', $get('target_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

                MarkdownEditor::make('issue')
                    ->columnSpanFull()
                    ->label('Issue'),

                MarkdownEditor::make('description')
                    ->columnSpanFull()
                    ->label('Description'),

                Select::make('country_id')
                    ->label('Country')
                    ->relationship('country', 'name')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->columnSpanFull()
                    ->afterStateUpdated(function (callable $set) {
                        $set('administrative_level_1_id', null);
                        $set('administrative_level_2_id', null);
                    }),

                Select::make('administrative_level_1_id')
                    ->label('Administrative Level 1')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel1::where('country_id', $get('country_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->reactive()
                    ->columnSpanFull()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('administrative_level_2_id', null)
                    ),

                Select::make('administrative_level_2_id')
                    ->label('Administrative Level 2')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel2::where('administrative_level_1_id', $get('administrative_level_1_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->reactive()
                    ->columnSpanFull()
                    ->afterStateUpdated(fn (callable $set) =>
                        $set('administrative_level_3_id', null)
                    ),

                Select::make('administrative_level_3_id')
                    ->label('Administrative Level 3')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel3::where('administrative_level_2_id', $get('administrative_level_2_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

                 Select::make('administrative_level_4_id')
                    ->label('Administrative Level 4')
                    ->options(fn (callable $get) =>
                        AdministrativeLevel4::where('administrative_level_3_id', $get('administrative_level_3_id'))
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->columnSpanFull()
                    ->reactive(),

               TextInput::make('address')
                    ->label('Address')
                    ->required()
                    ->suffixAction(
                        Action::make('generateLocation')
                            ->icon('heroicon-o-map-pin')
                            ->action(function (callable $get, callable $set) {

                                $address = $get('address');
                                if (!$address) return;

                                $geo = Http::withHeaders([
                                    'User-Agent' => 'Laravel-Filament-App/1.0'
                                ])
                                ->retry(3, 1000)
                                ->timeout(20)
                                ->get('https://nominatim.openstreetmap.org/search', [
                                    'q' => $address,
                                    'format' => 'json',
                                    'limit' => 1,
                                ])
                                ->json();

                                if (!empty($geo)) {
                                    $set('latitude', (float) $geo[0]['lat']);
                                    $set('longitude', (float) $geo[0]['lon']);
                                }
                            })
                    ),

                Hidden::make('latitude')->dehydrated(),
                Hidden::make('longitude')->dehydrated(),

                ViewField::make('map')
                    ->view('filament.forms.leaflet-map')
                    ->statePath('map')
                    ->dehydrated(false)
                    ->columnSpanFull(),

                Textarea::make('additional_info')
                    ->columnSpanFull()
                    ->label('Additional Info'),

                Forms\Components\TextInput::make('number_of_incident')
                    ->numeric()
                    ->columnSpanFull()
                    ->label('Number Of Incident'),

                Forms\Components\TextInput::make('number_of_injuries')
                    ->numeric()
                    ->columnSpanFull()
                    ->label('Number Of Injuries'),

                Forms\Components\TextInput::make('number_of_fatalities')
                    ->numeric()
                    ->columnSpanFull()
                    ->label('Number Of Fatalities'),

                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->columnSpanFull()
                    ->label('Images'),

               Radio::make('icon')
                ->label('Icon')
                ->columnSpanFull()
                ->options([
                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-purple.png' => 'Demo/Protest/Strike',
                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-red.png' => 'Security/Crime',
                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-orange.png' => 'Non-Security/Crime',
                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-light-purple.png' => 'Terrorism/Separatism',
                ])
                ->descriptions([
                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-purple.png'
                        => new HtmlString('<img src="https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-purple.png" class="w-20 h-20 mx-auto" />'),

                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-red.png'
                        => new HtmlString('<img src="https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-red.png" class="w-20 h-20 mx-auto" />'),

                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-orange.png'
                        => new HtmlString('<img src="https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-orange.png" class="w-20 h-20 mx-auto" />'),

                    'https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-light-purple.png'
                        => new HtmlString('<img src="https://id.concordreview.com/wp-content/plugins/w2gm/resources/images/map_icons/icons/_new/dot-light-purple.png" class="w-20 h-20 mx-auto" />'),
                ])
                ->inline(),
            ]);
    }
}
