<?php

namespace App\Filament\Resources\ChatDokters\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ChatDokterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customerId')
                    ->required(),
                TextInput::make('dokterId')
                    ->required(),
                DateTimePicker::make('date'),
                Select::make('status')
                    ->options(['Online' => 'Online', 'Offline' => 'Offline', 'Sibuk' => 'Sibuk', 'Tersedia' => 'Tersedia'])
                    ->default(null),
                \Filament\Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public')
                    ->directory('images/team')
                    ->visibility('public')
                    ->fetchFileInformation(true)
                    ->previewable(false)
                    ->openable()
                    ->downloadable(),
            ]);
    }
}
