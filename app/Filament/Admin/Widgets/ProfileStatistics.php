<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Profile;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProfileStatistics extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = $week = $month = 0;

        $profiles = Profile::query()
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->select(['created_at'])
            ->get();

        if ($profiles->isNotEmpty()) {
            $today = $profiles->where('created_at', '>=', today()->startOfDay())->count();
            $week = $profiles->where('created_at', '>=', today()->startOfWeek())->count();
            $month = $profiles->where('created_at', '>=', today()->startOfMonth())->count();
        }

        return [
            Stat::make(__('attributes.profile_creation_for_today'), $today),
            Stat::make(__('attributes.profile_creation_for_this_week'), $week),
            Stat::make(__('attributes.profile_creation_for_this_month'), $month),
        ];
    }
}
