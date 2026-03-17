<?php

namespace App\Filament\Resources\SponsorLogos;

use App\Filament\Resources\SponsorLogos\Pages\CreateSponsorLogo;
use App\Filament\Resources\SponsorLogos\Pages\EditSponsorLogo;
use App\Filament\Resources\SponsorLogos\Pages\ListSponsorLogos;
use App\Filament\Resources\SponsorLogos\Pages\ViewSponsorLogo;
use App\Filament\Resources\SponsorLogos\Schemas\SponsorLogoForm;
use App\Filament\Resources\SponsorLogos\Schemas\SponsorLogoInfolist;
use App\Filament\Resources\SponsorLogos\Tables\SponsorLogosTable;
use App\Models\SponsorLogo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SponsorLogoResource extends Resource
{
    protected static ?string $model = SponsorLogo::class;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Sponsor Logos';

    protected static ?string $modelLabel = 'Sponsor Logo';

    protected static ?string $pluralModelLabel = 'Sponsor Logos';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten Acara';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return SponsorLogoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SponsorLogoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SponsorLogosTable::configure($table);
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
            'index' => ListSponsorLogos::route('/'),
            'create' => CreateSponsorLogo::route('/create'),
            'view' => ViewSponsorLogo::route('/{record}'),
            'edit' => EditSponsorLogo::route('/{record}/edit'),
        ];
    }
}
