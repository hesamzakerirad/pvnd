<?php

namespace App\Filament\Admin\Resources\Links\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label(__('attributes.user'))
                    ->relationship('user', 'name'),
                TextInput::make('title')
                    ->label(__('attributes.title'))
                    ->required(),
                TextInput::make('label')
                    ->label(__('attributes.label')),
                TextInput::make('uri')
                    ->label(__('attributes.uri'))
                    ->required(),
                TextInput::make('location')
                    ->label(__('attributes.location'))
                    ->required(),
                TextInput::make('redirect_http_code')
                    ->label(__('attributes.redirect_http_code'))
                    ->required()
                    ->default('301'),
                Toggle::make('add_utm_tags')
                    ->label(__('attributes.add_utm_tags'))
                    ->required(),
                DateTimePicker::make('expired_at')
                    ->label(__('attributes.expired_at')),
            ]);
    }
}
