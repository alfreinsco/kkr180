<?php

namespace App\Filament\Resources\Performers;

use App\Filament\Resources\Performers\Pages\CreatePerformer;
use App\Filament\Resources\Performers\Pages\EditPerformer;
use App\Filament\Resources\Performers\Pages\ListPerformers;
use App\Filament\Resources\Performers\Pages\ViewPerformer;
use App\Filament\Resources\Performers\Schemas\PerformerForm;
use App\Filament\Resources\Performers\Schemas\PerformerInfolist;
use App\Filament\Resources\Performers\Tables\PerformersTable;
use App\Models\Performer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerformerResource extends Resource
{
    protected static ?string $model = Performer::class;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Performer';

    protected static ?string $modelLabel = 'Performer';

    protected static ?string $pluralModelLabel = 'Performer';

    public static function form(Schema $schema): Schema
    {
        return PerformerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PerformerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerformersTable::configure($table);
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
            'index' => ListPerformers::route('/'),
            'create' => CreatePerformer::route('/create'),
            'view' => ViewPerformer::route('/{record}'),
            'edit' => EditPerformer::route('/{record}/edit'),
        ];
    }
}
