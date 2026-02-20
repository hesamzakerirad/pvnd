<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Link;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LinkStatistics extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = $week = $month = 0;

        $links = Link::query()
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->select(['created_at'])
            ->get();

        if ($links->isNotEmpty()) {
            $today = $links->where('created_at', '>=', today()->startOfDay())->count();
            $week = $links->where('created_at', '>=', today()->startOfWeek())->count();
            $month = $links->where('created_at', '>=', today()->startOfMonth())->count();
        }

        return [
            Stat::make(__('attributes.link_creation_for_today'), $today),
            Stat::make(__('attributes.link_creation_for_this_week'), $week),
            Stat::make(__('attributes.link_creation_for_this_month'), $month),
        ];
    }
}
