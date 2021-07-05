<?php

namespace App\Filament\Resources\EventCategoryResource\Pages;

use App\Filament\Resources\EventCategoryResource;
use Filament\Resources\Pages\Page;

class SortEventCategory extends Page
{
    public static $resource = EventCategoryResource::class;

    public static $view = 'filament.resources.event-category-resource.pages.sort-event-category';
}
