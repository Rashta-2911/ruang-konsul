<?php

namespace App\Filament\Resources\DetailPemesanans;

use App\Filament\Resources\DetailPemesanans\Pages\CreateDetailPemesanan;
use App\Filament\Resources\DetailPemesanans\Pages\EditDetailPemesanan;
use App\Filament\Resources\DetailPemesanans\Pages\ListDetailPemesanans;
use App\Filament\Resources\DetailPemesanans\Schemas\DetailPemesananForm;
use App\Filament\Resources\DetailPemesanans\Tables\DetailPemesanansTable;
use App\Models\DetailPemesanan;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetailPemesananResource extends Resource
{
    protected static ?string $model = DetailPemesanan::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-m-document-text';
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Transaksi';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return DetailPemesananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetailPemesanansTable::configure($table);
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
            'index' => ListDetailPemesanans::route('/'),
            'create' => CreateDetailPemesanan::route('/create'),
            'edit' => EditDetailPemesanan::route('/{record}/edit'),
        ];
    }
}
