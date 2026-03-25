<?php

namespace App\Filament\Resources\IngatkanSayas;

use App\Filament\Resources\IngatkanSayas\Pages\CreateIngatkanSaya;
use App\Filament\Resources\IngatkanSayas\Pages\EditIngatkanSaya;
use App\Filament\Resources\IngatkanSayas\Pages\ListIngatkanSayas;
use App\Filament\Resources\IngatkanSayas\Pages\ListTrashedIngatkanSayas;
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
use Illuminate\Database\Eloquent\Builder;

class IngatkanSayaResource extends Resource
{
    protected static ?string $model = IngatkanSaya::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentList;

    protected static ?string $navigationLabel = 'Data Pendaftar';

    protected static ?string $modelLabel = 'Pendaftar';

    protected static ?string $pluralModelLabel = 'Data Pendaftar';

    protected static string|\UnitEnum|null $navigationGroup = 'Data & Pendaftaran';

    protected static ?int $navigationSort = 2;

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()->withTrashed();
    }

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
            'trashed' => ListTrashedIngatkanSayas::route('/trashed'),
            'create' => CreateIngatkanSaya::route('/create'),
            'view' => ViewIngatkanSaya::route('/{record}'),
            'edit' => EditIngatkanSaya::route('/{record}/edit'),
        ];
    }
}
