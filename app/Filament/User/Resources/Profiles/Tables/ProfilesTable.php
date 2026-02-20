<?php

namespace App\Filament\User\Resources\Profiles\Tables;

use App\Filament\User\Resources\Profiles\ProfileResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('uri')
                    ->label(__('attributes.uri'))
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('attributes.title')),
                TextColumn::make('label')
                    ->label(__('attributes.label'))
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_public')
                    ->label(__('attributes.is_public'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('attributes.created_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('attributes.updated_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('visit')
                    ->label(__('attributes.visit'))
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route('redirect', ['uri' => '@'.$record->uri])),
                Action::make('statistics')
                    ->label(__('attributes.statistics'))
                    ->icon('heroicon-o-chart-bar')
                    ->url(fn ($record) => ProfileResource::getUrl('statistics', ['record' => $record])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
