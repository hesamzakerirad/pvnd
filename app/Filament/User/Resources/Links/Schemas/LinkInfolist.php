<?php

namespace App\Filament\User\Resources\Links\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LinkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(auth()->id()),
                TextEntry::make('label')
                    ->label(__('attributes.label'))
                    ->placeholder('-'),
                TextEntry::make('uri')
                    ->label(__('attributes.uri')),
                TextEntry::make('location')
                    ->label(__('attributes.location'))
                    ->url(fn($record) => $record->location)
                    ->color('info'),
                TextEntry::make('redirect_http_code')
                    ->label(__('attributes.redirect_http_code'))
                    ->badge(),
                IconEntry::make('add_utm_tags')
                    ->label(__('attributes.add_utm_tags'))
                    ->boolean(),
                IconEntry::make('is_created_using_api')
                    ->label(__('attributes.is_created_using_api'))
                    ->boolean(),
                TextEntry::make('expired_at')
                    ->label(__('attributes.expired_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label(__('attributes.created_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('attributes.updated_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
            ]);
    }
}
