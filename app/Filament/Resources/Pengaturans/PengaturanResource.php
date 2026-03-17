<?php

namespace App\Filament\Resources\Pengaturans;

use App\Filament\Resources\Pengaturans\Pages\EditPengaturan;
use App\Filament\Resources\Pengaturans\Pages\ViewPengaturanSingle;
use App\Filament\Resources\Pengaturans\Schemas\PengaturanForm;
use App\Filament\Resources\Pengaturans\Schemas\PengaturanInfolist;
use App\Models\Pengaturan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class PengaturanResource extends Resource
{
    protected static ?string $model = Pengaturan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?string $modelLabel = 'Pengaturan';

    protected static ?string $pluralModelLabel = 'Data Pengaturan';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PengaturanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PengaturanInfolist::configure($schema);
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
            'index' => ViewPengaturanSingle::route('/'),
            'edit' => EditPengaturan::route('/{record}/edit'),
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
