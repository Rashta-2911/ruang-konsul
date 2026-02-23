<?php

namespace App\Filament\Resources\Dokters;

use App\Filament\Resources\Dokters\Pages\CreateDokter;
use App\Filament\Resources\Dokters\Pages\EditDokter;
use App\Filament\Resources\Dokters\Pages\ListDokters;
use App\Filament\Resources\Dokters\Schemas\DokterForm;
use App\Filament\Resources\Dokters\Tables\DoktersTable;
use App\Models\Dokter;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;



class DokterResource extends Resource
{
    protected static ?string $model = Dokter::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-m-user-plus';
    protected static string | UnitEnum | null $navigationGroup = 'Layanan Medis';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'dokterName';

    public static function form(Schema $schema): Schema
    {
        return DokterForm::configure($schema);
        FileUpload::make('attachment')
            ->label('Attachment')
            ->disk('public')
            ->directory('attachments')
            ->preserveFilenames()
            ->visibility('public');

    }

    public static function table(Table $table): Table
    {
        return DoktersTable::configure($table);
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
            'index' => ListDokters::route('/'),
            'create' => CreateDokter::route('/create'),
            'edit' => EditDokter::route('/{record}/edit'),
        ];
    }
}
