<?php

namespace App\Filament\Admin\Resources\Profiles\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label(__('attributes.user'))
                    ->placeholder('-'),
                TextEntry::make('uri')
                    ->label(__('attributes.uri'))
                    ->placeholder('-'),
                TextEntry::make('title')
                    ->label(__('attributes.title'))
                    ->placeholder('-'),
                TextEntry::make('label')
                    ->label(__('attributes.label'))
                    ->placeholder('-'),
                TextEntry::make('position')
                    ->label(__('attributes.position'))
                    ->placeholder('-'),
                TextEntry::make('bio')
                    ->markdown()
                    ->label(__('attributes.bio'))
                    ->placeholder('-')
                    ->columnSpanFull(),
                RepeatableEntry::make('links')
                    ->label(__('attributes.links'))
                    ->schema([
                        TextEntry::make('label')
                            ->label(__('attributes.label'))
                            ->disabled(),
                        TextEntry::make('location')
                            ->label(__('attributes.location'))
                            ->disabled(),
                    ])
                    ->disabled()
                    ->columnSpanFull(),
                SpatieMediaLibraryImageEntry::make('thumbnail')
                    ->collection('thumbnail')
                    ->columnSpanFull(),
                SpatieMediaLibraryImageEntry::make('cover')
                    ->collection('cover')
                    ->columnSpanFull(),
                IconEntry::make('is_public')
                    ->label(__('attributes.is_public'))
                    ->boolean(),
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
