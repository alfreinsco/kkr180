<?php

namespace App\Filament\Resources\IngatkanSayas;

use App\Filament\Resources\IngatkanSayas\Pages\CreateIngatkanSaya;
use App\Filament\Resources\IngatkanSayas\Pages\EditIngatkanSaya;
use App\Filament\Resources\IngatkanSayas\Pages\ListIngatkanSayas;
use App\Filament\Resources\IngatkanSayas\Pages\ViewIngatkanSaya;
use App\Filament\Resources\IngatkanSayas\Schemas\IngatkanSayaForm;
use App\Filament\Resources\IngatkanSayas\Schemas\IngatkanSayaInfolist;
use App\Filament\Resources\IngatkanSayas\Tables\IngatkanSayasTable;
use App\Models\IngatkanSaya;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IngatkanSayaResource extends Resource
{
    protected static ?string $model = IngatkanSaya::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBellAlert;

    protected static ?string $navigationLabel = 'Ingatkan Saya';

    protected static ?string $modelLabel = 'Ingatkan Saya';

    protected static ?string $pluralModelLabel = 'Data Ingatkan Saya';

    protected static string|\UnitEnum|null $navigationGroup = 'Data & Pendaftaran';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return IngatkanSayaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IngatkanSayaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IngatkanSayasTable::configure($table);
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
            'index' => ListIngatkanSayas::route('/'),
            'create' => CreateIngatkanSaya::route('/create'),
            'view' => ViewIngatkanSaya::route('/{record}'),
            'edit' => EditIngatkanSaya::route('/{record}/edit'),
        ];
    }
}
