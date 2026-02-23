<?php

namespace App\Filament\Resources\DetailPemesanans\Pages;

use App\Filament\Resources\DetailPemesanans\DetailPemesananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDetailPemesanan extends EditRecord
{
    protected static string $resource = DetailPemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
