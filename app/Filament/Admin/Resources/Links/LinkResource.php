<?php

namespace App\Filament\Admin\Resources\Links;

use App\Filament\Admin\Resources\Links\Pages\CreateLink;
use App\Filament\Admin\Resources\Links\Pages\EditLink;
use App\Filament\Admin\Resources\Links\Pages\ListLinks;
use App\Filament\Admin\Resources\Links\Pages\ViewLink;
use App\Filament\Admin\Resources\Links\Schemas\LinkForm;
use App\Filament\Admin\Resources\Links\Schemas\LinkInfolist;
use App\Filament\Admin\Resources\Links\Tables\LinksTable;
use App\Models\Link;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $recordTitleAttribute = 'Link';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLink;

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
            'statistics' => Pages\LinkStatistics::route('/{record}/statistics'),
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
