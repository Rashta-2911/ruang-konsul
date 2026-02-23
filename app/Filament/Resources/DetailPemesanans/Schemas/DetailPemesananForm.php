<?php

namespace App\Filament\Resources\DetailPemesanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DetailPemesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pemesananId')
                    ->default(null),
                TextInput::make('produkId')
                    ->default(null),
                TextInput::make('hargaSatuan')
                    ->numeric()
                    ->default(null),
                TextInput::make('qty')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
