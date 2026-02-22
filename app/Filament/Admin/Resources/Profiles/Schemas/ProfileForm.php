<?php

namespace App\Filament\Admin\Resources\Profiles\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label(__('attributes.user'))
                    ->relationship('user', 'name'),
                SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->label(__('attributes.thumbnail'))
                    ->collection('thumbnail')
                    ->image()
                    ->disk(config('media-library.disk_name'))
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->required(),
                SpatieMediaLibraryFileUpload::make('cover')
                    ->label(__('attributes.cover'))
                    ->collection('cover')
                    ->image()
                    ->disk(config('media-library.disk_name'))
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->required(),
                TextInput::make('uri')
                    ->label(__('attributes.uri'))
                    ->required()
                    ->unique(),
                TextInput::make('title')
                    ->label(__('attributes.title'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('label')
                    ->label(__('attributes.label'))
                    ->maxLength(255),
                TextInput::make('position')
                    ->label(__('attributes.position'))
                    ->maxLength(255),
                MarkdownEditor::make('bio')
                    ->label(__('attributes.bio'))
                    ->columnSpanFull(),
                Repeater::make('links')
                    ->label(__('attributes.links'))
                    ->schema([
                        TextInput::make('label')
                            ->label(__('attributes.label'))
                            ->required(),

                        TextInput::make('location')
                            ->label(__('attributes.location'))
                            ->visible(fn ($get) => ! $get('is_downloadable'))
                            ->required(fn ($get) => ! $get('is_downloadable'))
                            ->default(null),

                        SpatieMediaLibraryFileUpload::make('file')
                            ->collection('file')
                            ->label(__('attributes.file'))
                            ->rule('file')
                            ->visible(fn ($get) => $get('is_downloadable'))
                            ->required(fn ($get) => $get('is_downloadable'))
                            ->disk(config('media-library.disk_name'))
                            ->preserveFilenames()
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/zip',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            ])
                            ->default(null),

                        Toggle::make('is_downloadable')
                            ->label(__('attributes.is_downloadable'))
                            ->reactive(),
                    ])
                    ->columnSpanFull(),
                Toggle::make('is_public')
                    ->label(__('attributes.is_public'))
                    ->required(),
            ]);
    }
}
