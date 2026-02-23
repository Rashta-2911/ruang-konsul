<?php

namespace App\Filament\Resources\FormAppointments;

use App\Filament\Resources\FormAppointments\Pages\CreateFormAppointment;
use App\Filament\Resources\FormAppointments\Pages\EditFormAppointment;
use App\Filament\Resources\FormAppointments\Pages\ListFormAppointments;
use App\Filament\Resources\FormAppointments\Schemas\FormAppointmentForm;
use App\Filament\Resources\FormAppointments\Tables\FormAppointmentsTable;
use App\Models\FormAppointment;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormAppointmentResource extends Resource
{
    protected static ?string $model = FormAppointment::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-m-calendar-days';
    protected static string | UnitEnum | null $navigationGroup = 'Layanan Medis';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'appointmentId';

    public static function form(Schema $schema): Schema
    {
        return FormAppointmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormAppointmentsTable::configure($table);
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
            'index' => ListFormAppointments::route('/'),
            'create' => CreateFormAppointment::route('/create'),
            'edit' => EditFormAppointment::route('/{record}/edit'),
        ];
    }
}
