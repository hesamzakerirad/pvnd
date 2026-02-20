<?php

namespace App\Filament\User\Resources\Links\Pages;

use App\Filament\User\Resources\Links\LinkResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('statistics')
                ->label(__('attributes.statistics'))
                ->icon('heroicon-o-chart-bar')
                ->color('info')
                ->url(fn ($record) => LinkResource::getUrl('statistics', ['record' => $record])),
            Action::make('back')
                ->label(__('attributes.back'))
                ->icon('heroicon-o-arrow-left')
                ->url(route('filament.user.resources.links.index'))
                ->color('gray'),
        ];
    }
}
