<?php

namespace App\Filament\User\Resources\Links;

use App\Filament\User\Resources\Links\Pages\CreateLink;
use App\Filament\User\Resources\Links\Pages\EditLink;
use App\Filament\User\Resources\Links\Pages\LinkStatistics;
use App\Filament\User\Resources\Links\Pages\ListLinks;
use App\Filament\User\Resources\Links\Pages\ViewLink;
use App\Filament\User\Resources\Links\Schemas\LinkForm;
use App\Filament\User\Resources\Links\Schemas\LinkInfolist;
use App\Filament\User\Resources\Links\Tables\LinksTable;
use App\Models\Link;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Link';

    public static function form(Schema $schema): Schema
    {
        return LinkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LinkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LinksTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLinks::route('/'),
            'create' => CreateLink::route('/create'),
            'view' => ViewLink::route('/{record}'),
            'edit' => EditLink::route('/{record}/edit'),
            'statistics' => LinkStatistics::route('/{record}/statistics'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('attributes.link');
    }

    public static function getPluralModelLabel(): string
    {
        return __('attributes.links');
    }
}
