<?php

namespace App\Filament\Admin\Resources\Links\Tables;

use App\Filament\Admin\Resources\Links\LinkResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('attributes.user'))
                    ->searchable(),
                TextColumn::make('label')
                    ->label(__('attributes.label'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('uri')
                    ->label(__('attributes.uri'))
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('location')
                    ->label(__('attributes.location'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('redirect_http_code')
                    ->label(__('attributes.redirect_http_code'))
                    ->badge(),
                IconColumn::make('add_utm_tags')
                    ->label(__('attributes.add_utm_tags'))
                    ->boolean(),
                TextColumn::make('expired_at')
                    ->label(__('attributes.expired_at'))
                    ->dateTime()
                    ->formatStateUsing(
                        fn ($state) => verta($state)->format('Y/m/d')
                    )
                    ->sortable(),
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
                    ->url(fn ($record) => route('redirect', ['uri' => $record->uri])),
                Action::make('statistics')
                    ->label(__('attributes.statistics'))
                    ->icon('heroicon-o-chart-bar')
                    ->url(fn ($record) => LinkResource::getUrl('statistics', ['record' => $record])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
