<?php

namespace App\Filament\Resources\Pembayarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembayaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customerId')
                    ->default(null),
                TextInput::make('pemesananId')
                    ->default(null),
                TextInput::make('chatDokterId')
                    ->default(null),
                TextInput::make('amount')
                    ->numeric()
                    ->default(null),
                TextInput::make('metodePembayaran')
                    ->default(null),
                DatePicker::make('date'),
                TextInput::make('status')
                    ->default(null),
            ]);
    }
}
