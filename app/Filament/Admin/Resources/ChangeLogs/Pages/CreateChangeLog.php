<?php

namespace App\Filament\Admin\Resources\ChangeLogs\Pages;

use App\Filament\Admin\Resources\ChangeLogs\ChangeLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChangeLog extends CreateRecord
{
    protected static string $resource = ChangeLogResource::class;
}
