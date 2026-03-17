<?php

namespace App\Filament\Resources\Tentangs;

use App\Filament\Resources\Tentangs\Pages\EditTentang;
use App\Filament\Resources\Tentangs\Pages\ViewTentangSingle;
use App\Filament\Resources\Tentangs\Schemas\TentangForm;
use App\Filament\Resources\Tentangs\Schemas\TentangInfolist;
use App\Models\Tentang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class TentangResource extends Resource
{
    protected static ?string $model = Tentang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $navigationLabel = 'Tentang';

    protected static ?string $modelLabel = 'Tentang';

    protected static ?string $pluralModelLabel = 'Tentang';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten Acara';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return TentangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TentangInfolist::configure($schema);
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
            'index' => ViewTentangSingle::route('/'),
            'edit' => EditTentang::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
