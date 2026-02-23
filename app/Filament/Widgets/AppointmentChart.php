<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\FormAppointment;

class AppointmentChart extends ChartWidget
{
    protected ?string $heading = 'Statistik Appointment';

    protected function getData(): array
{
    return [
        'datasets' => [
            [
                'label' => 'Appointments',
                'data' => [
                    FormAppointment::whereMonth('date', 1)->count(),
                    FormAppointment::whereMonth('date', 2)->count(),
                    FormAppointment::whereMonth('date', 3)->count(),
                    FormAppointment::whereMonth('date', 4)->count(),
                    FormAppointment::whereMonth('date', 5)->count(),
                    FormAppointment::whereMonth('date', 6)->count(),
                    FormAppointment::whereMonth('date', 7)->count(),
                    FormAppointment::whereMonth('date', 8)->count(),
                    FormAppointment::whereMonth('date', 9)->count(),
                    FormAppointment::whereMonth('date', 10)->count(),
                    FormAppointment::whereMonth('date', 11)->count(),
                    FormAppointment::whereMonth('date', 12)->count(),
                ],
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'borderColor' => 'rgb(54, 162, 235)',
                'fill' => 'start',
                'tension' => 0.4,
            ],
        ],
        'labels' => [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ],
    ];
}


    protected function getType(): string
    {
        return 'line';
    }
}
