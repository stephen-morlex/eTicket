<?php

namespace App\Filament\Widgets;

use App\Models\EventCategory;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class Stats extends Widget
{
    public static $view = 'filament.widgets.stats';
    public $categories;

    public function mount()
    {
        return [
            $this->categories = EventCategory::count()
        ];
    }
}
