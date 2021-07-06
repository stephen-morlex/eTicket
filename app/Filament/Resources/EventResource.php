<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use Livewire\Component;

class EventResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')->autofocus()->required()->placeholder('Enter name of the event.'),
                Components\TextArea::make('description')->autofocus()->required()->placeholder('write breif description of the event.'),
                Components\DateTimePicker::make('started_at')->format('Y-m-d H:i:s')->displayFormat('F j, Y')->autofocus()->required()->placeholder('write breif description of the event.'),
                Components\DateTimePicker::make('ended_at')->format('Y-m-d H:i:s')->displayFormat($format = 'F j, Y')->autofocus()->required()->placeholder('write breif description of the event.'),
                Components\DatePicker::make('date')->autofocus()->required()->placeholder('write breif description of the event.'),
                Components\FileUpload::make('poster')->image()->maxSize(5000),
                Components\FileUpload::make('banner')->image()->maxSize(5000),
                Components\Toggle::make('is_active')->label('Status'),
                Components\Toggle::make('is_featured')->label('Feartured'),
                Components\Toggle::make('is_trending')->label('Trending'),
                Components\BelongsToSelect::make('event_category_id')->relationship('category', 'name'),
                Components\BelongsToSelect::make('event_location_id')->relationship('location', 'name'),
                Components\BelongsToSelect::make('event_type_id')->relationship('type', 'name'),
            ])->columns(2);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name')->primary(),
                Columns\Text::make('description')->primary(),
                Columns\Text::make('started_at')->dateTime($format = 'F j, Y H:i:s')->primary(),
                Columns\Text::make('ended_at')->dateTime($format = 'F j, Y H:i:s')->primary(),
                Columns\Text::make('date')->dateTime($format = ' j F, Y')->primary(),
                // Columns\Column::make('category.name'),
                // Columns\Column::make('location.name'),
                // Columns\Column::make('type.name'),
                Columns\Boolean::make('is_active')->label('Status'),
                Columns\Boolean::make('is_feature')->label('Featured'),
                Columns\Boolean::make('is_trending')->label('Trending'),

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
            Pages\ListEvents::routeTo('/', 'index'),
            Pages\CreateEvent::routeTo('/create', 'create'),
            Pages\EditEvent::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
