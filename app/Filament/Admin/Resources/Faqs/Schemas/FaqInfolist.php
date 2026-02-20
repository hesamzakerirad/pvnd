<?php

namespace App\Filament\Admin\Resources\Faqs\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FaqInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('question')
                    ->markdown()
                    ->columnSpanFull()
                    ->label(__('attributes.question')),
                TextEntry::make('answer')
                    ->markdown()
                    ->columnSpanFull()
                    ->label(__('attributes.answer')),
                TextEntry::make('group')
                    ->label(__('attributes.group'))
                    ->formatStateUsing(
                        fn ($state) => __('attributes.'.$state)
                    ),
                TextEntry::make('order')
                    ->label(__('attributes.order'))
                    ->numeric(),
                IconEntry::make('is_visible')
                    ->label(__('attributes.is_visible'))
                    ->boolean(),
            ]);
    }
}
