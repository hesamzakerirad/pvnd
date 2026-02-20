<?php

namespace App\Filament\Admin\Resources\Profiles\Pages;

use App\Filament\Admin\Resources\Profiles\ProfileResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('back')
                ->label(__('attributes.back'))
                ->icon('heroicon-o-arrow-left')
                ->url(route('filament.admin.resources.profiles.index'))
                ->color('gray'),
        ];
    }
}
