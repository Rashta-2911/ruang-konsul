<?php

namespace App\Filament\Resources\FormAppointments\Pages;

use App\Filament\Resources\FormAppointments\FormAppointmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormAppointment extends EditRecord
{
    protected static string $resource = FormAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
