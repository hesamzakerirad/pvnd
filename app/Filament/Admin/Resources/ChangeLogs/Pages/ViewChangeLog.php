<?php

namespace App\Filament\Admin\Resources\ChangeLogs\Pages;

use App\Filament\Admin\Resources\ChangeLogs\ChangeLogResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewChangeLog extends ViewRecord
{
    protected static string $resource = ChangeLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
