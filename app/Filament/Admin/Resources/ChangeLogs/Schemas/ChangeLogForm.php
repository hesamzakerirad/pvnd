<?php

namespace App\Filament\Admin\Resources\ChangeLogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Schema;

class ChangeLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                MarkdownEditor::make('content')
                    ->label(__('attributes.content'))
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('created_at')
                    ->label(__('attributes.created_at')),
            ]);
    }
}
