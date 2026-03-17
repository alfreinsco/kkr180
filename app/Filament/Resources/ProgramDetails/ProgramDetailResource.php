<?php

namespace App\Filament\Resources\ProgramDetails;

use App\Filament\Resources\ProgramDetails\Pages\CreateProgramDetail;
use App\Filament\Resources\ProgramDetails\Pages\EditProgramDetail;
use App\Filament\Resources\ProgramDetails\Pages\ListProgramDetails;
use App\Filament\Resources\ProgramDetails\Pages\ViewProgramDetail;
use App\Filament\Resources\ProgramDetails\Schemas\ProgramDetailForm;
use App\Filament\Resources\ProgramDetails\Schemas\ProgramDetailInfolist;
use App\Filament\Resources\ProgramDetails\Tables\ProgramDetailsTable;
use App\Models\ProgramDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramDetailResource extends Resource
{
    protected static ?string $model = ProgramDetail::class;

    protected static ?string $recordTitleAttribute = 'judul';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Program Details';

    protected static ?string $modelLabel = 'Program Detail';

    protected static ?string $pluralModelLabel = 'Program Details';

    public static function form(Schema $schema): Schema
    {
        return ProgramDetailForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProgramDetailInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramDetailsTable::configure($table);
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
            'index' => ListProgramDetails::route('/'),
            'create' => CreateProgramDetail::route('/create'),
            'view' => ViewProgramDetail::route('/{record}'),
            'edit' => EditProgramDetail::route('/{record}/edit'),
        ];
    }
}
