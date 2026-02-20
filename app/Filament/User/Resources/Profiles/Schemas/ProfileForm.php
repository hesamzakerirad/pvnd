<?php

namespace App\Filament\User\Resources\Profiles\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(auth()->id()),
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
                            ->disk('public')
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
                SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->collection('thumbnail')
                    ->image()
                    // ->directory('images')
                    ->disk('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->columnSpanFull()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('cover')
                    ->collection('cover')
                    ->image()
                    // ->directory('images')
                    ->disk('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->columnSpanFull()
                    ->required(),
                Toggle::make('is_public')
                    ->label(__('attributes.is_public'))
                    ->required(),
            ]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        foreach ($data['links'] ?? [] as $index => $link) {

            if (! empty($link['is_downloadable'])) {

                /** @var Media|null $media */
                $media = $this
                    ->record
                    ->getMedia('downloads')
                    ->get($index);

                if ($media) {
                    $data['links'][$index]['media_id'] = $media->id;
                    unset($data['links'][$index]['location']);
                }
            }
        }

        return $data;
    }
}
