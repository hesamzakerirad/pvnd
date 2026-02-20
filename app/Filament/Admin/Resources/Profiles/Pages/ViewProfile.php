<?php

namespace App\Filament\Admin\Resources\Profiles\Pages;

use App\Filament\Admin\Resources\Profiles\ProfileResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProfile extends ViewRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('back')
                ->label(__('attributes.back'))
                ->icon('heroicon-o-arrow-left')
                ->url(route('filament.admin.resources.profiles.index'))
                ->color('gray'),
        ];
    }
}
