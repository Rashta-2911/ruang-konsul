<?php

namespace App\Filament\Resources\ChatMessages;

use App\Filament\Resources\ChatMessages\Pages\CreateChatMessage;
use App\Filament\Resources\ChatMessages\Pages\EditChatMessage;
use App\Filament\Resources\ChatMessages\Pages\ListChatMessages;
use App\Filament\Resources\ChatMessages\Schemas\ChatMessageForm;
use App\Filament\Resources\ChatMessages\Tables\ChatMessagesTable;
use App\Models\ChatMessage;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChatMessageResource extends Resource
{
    protected static ?string $model = ChatMessage::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-m-envelope';
    protected static string | UnitEnum | null $navigationGroup = 'Pusat Komunikasi';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return ChatMessageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChatMessagesTable::configure($table);
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
            'index' => ListChatMessages::route('/'),
            'create' => CreateChatMessage::route('/create'),
            'edit' => EditChatMessage::route('/{record}/edit'),
        ];
    }
}
