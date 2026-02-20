<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('attributes.name'))
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->label(__('attributes.phone'))
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label(__('attributes.email')),
                TextEntry::make('phone_verified_at')
                    ->label(__('attributes.phone_verification_date'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
                TextEntry::make('email_verified_at')
                    ->label(__('attributes.email_verification_date'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label(__('attributes.created_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('attributes.updated_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d - H:m:s')
                    )
                    ->placeholder('-'),
            ]);
    }
}
