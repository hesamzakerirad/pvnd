<?php

namespace App\Filament\User\Pages;

use App\Filament\User\Widgets\CreateInstantShortLink;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            CreateInstantShortLink::class,
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('attributes.dashboard');
    }

    public function getTitle(): string|Htmlable
    {
        return __('attributes.dashboard');
    }
}
