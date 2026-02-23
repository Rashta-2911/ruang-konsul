<?php

namespace App\Filament\Resources\FormAppointments\Pages;

use App\Filament\Resources\FormAppointments\FormAppointmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormAppointments extends ListRecords
{
    protected static string $resource = FormAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
