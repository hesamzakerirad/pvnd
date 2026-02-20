<?php

namespace App\Filament\Admin\Resources\ChangeLogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ChangeLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('content')
                    ->label(__('attributes.content')),
                TextEntry::make('created_at')
                    ->label(__('attributes.created_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->placeholder('-'),
            ]);
    }
}
