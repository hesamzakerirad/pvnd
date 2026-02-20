<?php

namespace App\Filament\Admin\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->label(__('attributes.name'))
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('attributes.phone'))
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('attributes.email'))
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('phone_verified_at')
                    ->label(__('attributes.phone_verification_date'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_verified_at')
                    ->label(__('attributes.email_verification_date'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('attributes.created_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('attributes.updated_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
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
