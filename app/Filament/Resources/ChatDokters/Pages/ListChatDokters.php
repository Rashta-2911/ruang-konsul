<?php

namespace App\Filament\Resources\ChatDokters\Pages;

use App\Filament\Resources\ChatDokters\ChatDokterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChatDokters extends ListRecords
{
    protected static string $resource = ChatDokterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
