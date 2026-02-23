<?php

namespace App\Filament\Resources\Pemesanans;

use App\Filament\Resources\Pemesanans\Pages\CreatePemesanan;
use App\Filament\Resources\Pemesanans\Pages\EditPemesanan;
use App\Filament\Resources\Pemesanans\Pages\ListPemesanans;
use App\Filament\Resources\Pemesanans\Schemas\PemesananForm;
use App\Filament\Resources\Pemesanans\Tables\PemesanansTable;
use App\Models\Pemesanan;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PemesananResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-m-clipboard-document-check';
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Transaksi';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'pemesananId';

    public static function form(Schema $schema): Schema
    {
        return PemesananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PemesanansTable::configure($table);
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
            'index' => ListPemesanans::route('/'),
            'create' => CreatePemesanan::route('/create'),
            'edit' => EditPemesanan::route('/{record}/edit'),
        ];
    }
}
