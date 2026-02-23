<?php

namespace App\Filament\Resources\ChatMessages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ChatMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('chatDokterId')
                    ->default(null),
                TextInput::make('customerId')
                    ->default(null),
                TextInput::make('dokterId')
                    ->default(null),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Select::make('sender_type')
                    ->options(['customer' => 'Customer', 'dokter' => 'Dokter'])
                    ->required(),
                TextInput::make('chat_type')
                    ->default('doctor'),
            ]);
    }
}
