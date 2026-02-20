<?php

namespace App\Filament\Admin\Resources\Links\Pages;

use App\Filament\Admin\Resources\Links\LinkResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLink extends EditRecord
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('back')
                ->label(__('attributes.back'))
                ->icon('heroicon-o-arrow-left')
                ->url(route('filament.admin.resources.links.index'))
                ->color('gray'),
        ];
    }
}
