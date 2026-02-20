<?php

namespace App\Filament\Admin\Resources\ChangeLogs\Pages;

use App\Filament\Admin\Resources\ChangeLogs\ChangeLogResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditChangeLog extends EditRecord
{
    protected static string $resource = ChangeLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
