<?php

namespace App\Filament\User\Resources\Profiles;

use App\Filament\User\Resources\Profiles\Pages\CreateProfile;
use App\Filament\User\Resources\Profiles\Pages\EditProfile;
use App\Filament\User\Resources\Profiles\Pages\ListProfiles;
use App\Filament\User\Resources\Profiles\Pages\ViewProfile;
use App\Filament\User\Resources\Profiles\Schemas\ProfileForm;
use App\Filament\User\Resources\Profiles\Schemas\ProfileInfolist;
use App\Filament\User\Resources\Profiles\Tables\ProfilesTable;
use App\Models\Profile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Profile';

    public static function form(Schema $schema): Schema
    {
        return ProfileForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProfileInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilesTable::configure($table);
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
            'index' => ListProfiles::route('/'),
            'create' => CreateProfile::route('/create'),
            'view' => ViewProfile::route('/{record}'),
            'edit' => EditProfile::route('/{record}/edit'),
            'statistics' => Pages\ProfileStatistics::route('/{record}/statistics'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('attributes.profile');
    }

    public static function getPluralModelLabel(): string
    {
        return __('attributes.profiles');
    }
}
