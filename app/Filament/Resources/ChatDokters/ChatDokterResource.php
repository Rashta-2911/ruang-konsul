<?php

namespace App\Filament\Resources\ChatDokters;

use App\Filament\Resources\ChatDokters\Pages\CreateChatDokter;
use App\Filament\Resources\ChatDokters\Pages\EditChatDokter;
use App\Filament\Resources\ChatDokters\Pages\ListChatDokters;
use App\Filament\Resources\ChatDokters\Schemas\ChatDokterForm;
use App\Filament\Resources\ChatDokters\Tables\ChatDoktersTable;
use App\Models\ChatDokter;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChatDokterResource extends Resource
{
    protected static ?string $model = ChatDokter::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-m-chat-bubble-left-right';
    protected static string | UnitEnum | null $navigationGroup = 'Pusat Komunikasi';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'chatDokterId';

    public static function form(Schema $schema): Schema
    {
        return ChatDokterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChatDoktersTable::configure($table);
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
            'index' => ListChatDokters::route('/'),
            'create' => CreateChatDokter::route('/create'),
            'edit' => EditChatDokter::route('/{record}/edit'),
        ];
    }
}
