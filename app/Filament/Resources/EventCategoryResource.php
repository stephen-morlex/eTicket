<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventCategoryResource\Pages;
use App\Filament\Resources\EventCategoryResource\RelationManagers;
use App\Filament\Roles;
use App\Models\EventCategory;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class EventCategoryResource extends Resource
{
    public static $icon = 'heroicon-o-tag';
    public static $model = EventCategory::class;
    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')->autofocus()->required()->placeholder('Enter Event Category...'),
            ])
            ->columns(1);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name')->primary(),
                Columns\Boolean::make('is_active')->label('Status'),
            ])
            ->filters([
                // Filter::make('organizations', fn ($query) => $query->where('type', 'organization')),
                Filter::make('active', fn ($query) => $query->where('is_active', true)),
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
            Pages\ListEventCategories::routeTo('/', 'index'),
            Pages\CreateEventCategory::routeTo('/create', 'create'),
            Pages\EditEventCategory::routeTo('/{record}/edit', 'edit'),
            Pages\SortEventCategory::routeTo('/sort', 'sort'),
        ];
    }

    public static function authorization()
    {
        return [
            Roles\Organiser::deny(),
        ];
    }
}
