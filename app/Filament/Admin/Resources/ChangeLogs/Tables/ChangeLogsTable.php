<?php

namespace App\Filament\Admin\Resources\ChangeLogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChangeLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('content')
                    ->label(__('attributes.content')),
                TextColumn::make('created_at')
                    ->label(__('attributes.created_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn($state) => verta($state)->format('Y/m/d')
                    )
                    ->sortable(),
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
