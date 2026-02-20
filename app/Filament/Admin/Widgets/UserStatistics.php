<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatistics extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = $week = $month = 0;

        $users = User::query()
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->select('created_at')
            ->get();

        if ($users->isNotEmpty()) {
            $today = $users->where('created_at', '>=', today()->startOfDay())->count();
            $week = $users->where('created_at', '>=', today()->startOfWeek())->count();
            $month = $users->where('created_at', '>=', today()->startOfMonth())->count();
        }

        return [
            Stat::make(__('attributes.user_registration_for_today'), $today),
            Stat::make(__('attributes.user_registration_for_this_week'), $week),
            Stat::make(__('attributes.user_registration_for_this_month'), $month),
        ];
    }
}
