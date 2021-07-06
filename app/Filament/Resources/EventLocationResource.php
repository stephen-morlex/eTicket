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
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
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
