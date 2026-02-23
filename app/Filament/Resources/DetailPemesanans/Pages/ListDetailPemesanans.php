<?php

namespace App\Filament\Resources\DetailPemesanans\Pages;

use App\Filament\Resources\DetailPemesanans\DetailPemesananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetailPemesanans extends ListRecords
{
    protected static string $resource = DetailPemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
