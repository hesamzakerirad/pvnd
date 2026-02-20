<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('attributes.name'))
                    ->required(),
                TextInput::make('phone')
                    ->label(__('attributes.phone'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('attributes.email'))
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label(__('attributes.email_verification_date')),
                DateTimePicker::make('phone_verified_at')
                    ->label(__('attributes.phone_verification_date')),
                TextInput::make('password')
                    ->label(__('attributes.password'))
                    ->password()
                    ->required(),
            ]);
    }
}
