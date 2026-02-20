<?php

namespace App\Filament\Admin\Resources\Faqs\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                MarkdownEditor::make('question')
                    ->label(__('attributes.question'))
                    ->required()
                    ->columnSpanFull(),
                MarkdownEditor::make('answer')
                    ->label(__('attributes.answer'))
                    ->required()
                    ->columnSpanFull(),
                Select::make('group')
                    ->label(__('attributes.group'))
                    ->required()
                    ->default('general')
                    ->options([
                        'general' => __('attributes.general'),
                        'link' => __('attributes.link'),
                        'profile' => __('attributes.profile'),
                    ]),
                TextInput::make('order')
                    ->label(__('attributes.order'))
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('is_visible')
                    ->label(__('attributes.is_visible'))
                    ->required(),
            ]);
    }
}
