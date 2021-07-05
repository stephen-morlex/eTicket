<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\EventCategory;

class Settings extends Page
{
    public static $icon = 'heroicon-o-cog';
    public static $view = 'filament.pages.settings';
    public $categories;

    public function mount()
    {
        return [
            $this->categories = EventCategory::all()
        ];
    }
}
