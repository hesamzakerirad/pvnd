<?php

namespace App\Filament\User\Resources\Links\Pages;

use App\Filament\Admin\Resources\Links\LinkResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class LinkStatistics extends Page implements HasTable
{
    use InteractsWithRecord;
    use InteractsWithTable;

    protected static string $resource = LinkResource::class;

    protected static ?string $title = 'آمار بازدید';

    protected string $view = 'filament.user.resources.links.pages.link-statistics';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label(__('attributes.back'))
                ->icon('heroicon-o-arrow-left')
                ->url(route('filament.user.resources.links.index'))
                ->color('gray'),
        ];
    }

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getTableRecords(): Collection
    {
        $visits = $this->record
            ->views()
            ->select('id', 'viewed_at')
            ->get();

        $todayVisits = $visits->where('viewed_at', '>=', now()->startOfDay())->count();
        $thisWeekVisits = $visits->where('viewed_at', '>=', now()->startOfWeek())->count();
        $thisMonthVisits = $visits->where('viewed_at', '>=', now()->startOfMonth())->count();
        $totalVisits = $visits->count();

        return collect([
            ['id' => 1, 'title' => __('attributes.today'), 'count' => $todayVisits],
            ['id' => 2, 'title' => __('attributes.last_7_days'), 'count' => $thisWeekVisits],
            ['id' => 3, 'title' => __('attributes.last_30_days'), 'count' => $thisMonthVisits],
            ['id' => 4, 'title' => __('attributes.total'), 'count' => $totalVisits],
        ]);
    }

    public function getTableRecordKey($record): string
    {
        return (string) $record['id'];
    }

    public function table(Table $table): Table
    {
        return $table
            ->records(fn () => $this->getTableRecords())
            ->columns([
                TextColumn::make('title')
                    ->label(__('attributes.timeframe')),

                TextColumn::make('count')
                    ->label(__('attributes.count'))
                    ->numeric(),
            ])
            ->paginated(false);
    }
}
