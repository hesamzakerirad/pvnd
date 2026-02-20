<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\LinkStatistics;
use App\Filament\Admin\Widgets\ProfileStatistics;
use App\Filament\Admin\Widgets\UserStatistics;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            UserStatistics::class,
            LinkStatistics::class,
            ProfileStatistics::class,
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
