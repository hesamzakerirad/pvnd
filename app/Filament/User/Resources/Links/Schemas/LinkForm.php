<?php

namespace App\Filament\User\Resources\Links\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
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
                Hidden::make('user_id')
                    ->default(auth()->id()),
                TextInput::make('title')
                    ->label(__('attributes.title'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('label')
                    ->label(__('attributes.label'))
                    ->maxLength(255),
                TextInput::make('uri')
                    ->label(__('attributes.uri'))
                    ->required()
                    ->unique(),
                TextInput::make('location')
                    ->label(__('attributes.location'))
                    ->required()
                    ->rule('url'),
                Select::make('redirect_http_code')
                    ->label(__('attributes.redirect_http_code'))
                    ->required()
                    ->default('301')
                    ->options([
                        301 => 301,
                        302 => 302,
                        307 => 307,
                        308 => 308,
                    ]),
                Toggle::make('add_utm_tags')
                    ->label(__('attributes.add_utm_tags'))
                    ->required(),
                DateTimePicker::make('expired_at')
                    ->label(__('attributes.expired_at')),
            ]);
    }
}
