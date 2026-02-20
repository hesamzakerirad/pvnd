<?php

namespace App\Filament\Admin\Resources\Faqs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question')
                    ->markdown()
                    ->label(__('attributes.question')),
                TextColumn::make('answer')
                    ->markdown()
                    ->label(__('attributes.answer'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('group')
                    ->label(__('attributes.group'))
                    ->formatStateUsing(
                        fn ($state) => __('attributes.'.$state)
                    ),
                TextColumn::make('order')
                    ->label(__('attributes.order'))
                    ->numeric(),
                IconColumn::make('is_visible')
                    ->label(__('attributes.is_visible'))
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
