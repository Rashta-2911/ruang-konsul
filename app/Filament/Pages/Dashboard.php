<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\AdminStats;
use App\Filament\Widgets\AppointmentChart;
use App\Filament\Widgets\PemesananChart;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            AdminStats::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            AppointmentChart::class,
            PemesananChart::class,
        ];
    }
}
