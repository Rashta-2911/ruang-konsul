<?php

namespace App\Filament\Resources\ChatDokters\Pages;

use App\Filament\Resources\ChatDokters\ChatDokterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditChatDokter extends EditRecord
{
    protected static string $resource = ChatDokterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
