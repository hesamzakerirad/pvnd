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
                TextInput::make('uri')
                    ->label(__('attributes.uri'))
                    ->required(),
                TextInput::make('title')
                    ->label(__('attributes.title'))
                    ->required(),
                TextInput::make('label')
                    ->label(__('attributes.label'))
                    ->required(),
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
                            ->label(__('attributes.label')),
                        TextInput::make('location')
                            ->label(__('attributes.location')),
                    ])
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->collection('thumbnail')
                    ->image()
                    ->directory('images')
                    ->disk('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->columnSpanFull()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('cover')
                    ->collection('cover')
                    ->image()
                    ->directory('images')
                    ->disk('public')
                    ->imagePreviewHeight('200')
                    ->automaticallyResizeImagesToWidth(600)
                    ->automaticallyResizeImagesToHeight(200)
                    ->maxSize(2048)
                    ->columnSpanFull()
                    ->required(),
                Toggle::make('is_public')
                    ->label(__('attributes.is_public'))
                    ->required(),
            ]);
    }
}
