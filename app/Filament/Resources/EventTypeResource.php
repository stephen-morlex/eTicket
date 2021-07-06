<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventTypeResource\Pages;
use App\Filament\Resources\EventTypeResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class EventTypeResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')->autofocus()->required()->placeholder('Enter Event Category...'),
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
                Columns\Text::make('name')->primary(),
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
            Pages\ListEventTypes::routeTo('/', 'index'),
            Pages\CreateEventType::routeTo('/create', 'create'),
            Pages\EditEventType::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
