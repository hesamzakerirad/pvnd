<?php

namespace App\Filament\User\Resources\Profiles\Pages;

use App\Filament\User\Resources\Profiles\ProfileResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;
}
