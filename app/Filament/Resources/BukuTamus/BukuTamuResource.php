<?php

namespace App\Filament\Resources\BukuTamus;

use App\Filament\Resources\BukuTamus\Pages\CreateBukuTamu;
use App\Filament\Resources\BukuTamus\Pages\EditBukuTamu;
use App\Filament\Resources\BukuTamus\Pages\ListBukuTamus;
use App\Filament\Resources\BukuTamus\Pages\ViewBukuTamu;
use App\Filament\Resources\BukuTamus\Schemas\BukuTamuForm;
use App\Filament\Resources\BukuTamus\Schemas\BukuTamuInfolist;
use App\Filament\Resources\BukuTamus\Tables\BukuTamusTable;
use App\Models\BukuTamu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BukuTamuResource extends Resource
{
    protected static ?string $model = BukuTamu::class;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?string $navigationLabel = 'Buku Tamu';

    protected static ?string $modelLabel = 'Buku Tamu';

    protected static ?string $pluralModelLabel = 'Buku Tamu';

    protected static string|\UnitEnum|null $navigationGroup = 'Data & Pendaftaran';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return BukuTamuForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BukuTamuInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BukuTamusTable::configure($table);
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
            'index' => ListBukuTamus::route('/'),
            'create' => CreateBukuTamu::route('/create'),
            'view' => ViewBukuTamu::route('/{record}'),
            'edit' => EditBukuTamu::route('/{record}/edit'),
        ];
    }
}
