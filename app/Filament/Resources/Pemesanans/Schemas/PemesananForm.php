<?php

namespace App\Filament\Resources\Pemesanans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PemesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customerId')
                    ->default(null),
                DatePicker::make('date'),
                TextInput::make('totalPrice')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
