<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventLocationResource\Pages;
use App\Filament\Resources\EventLocationResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class EventLocationResource extends Resource
{
    public static $icon = 'heroicon-o-location-marker';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')->autofocus()->required()->placeholder('Enter Name of the location...'),
                Components\TextInput::make('lat')->autofocus()->type('number')->placeholder('Enter latitude of the location...'),
                Components\TextInput::make('lng')->autofocus()->type('number')->placeholder('Enter longitude of the location...'),
                Components\Toggle::make('is_active')
                    ->autofocus() // Autofocus the field.
                    ->inline() // Render the toggle inline with its label.
                    // ->offIcon($icon) // Set the icon that should be displayed when the toggle is off.
                    // ->onIcon($icon) // Set the icon that should be displayed when the toggle is on.
                    ->stacked(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name')->primary()->searchable()->sortable(),
                Columns\Text::make('lat')->label('Latitude')->primary(),
                Columns\Text::make('lng')->label('Longitude')->primary(),
                Columns\Boolean::make('is_active')->label('Status'),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListEventLocations::routeTo('/', 'index'),
            Pages\CreateEventLocation::routeTo('/create', 'create'),
            Pages\EditEventLocation::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
