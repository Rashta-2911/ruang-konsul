<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pemesanan;

class PemesananChart extends ChartWidget
{
    protected ?string $heading = 'Statistik Pemesanan';

   protected function getData(): array
{
    return [
        'datasets' => [
            [
                'label' => 'Pemesanan',
                'data' => [
                    Pemesanan::whereMonth('date', 1)->count(),
                    Pemesanan::whereMonth('date', 2)->count(),
                    Pemesanan::whereMonth('date', 3)->count(),
                    Pemesanan::whereMonth('date', 4)->count(),
                    Pemesanan::whereMonth('date', 5)->count(),
                    Pemesanan::whereMonth('date', 6)->count(),
                    Pemesanan::whereMonth('date', 7)->count(),
                    Pemesanan::whereMonth('date', 8)->count(),
                    Pemesanan::whereMonth('date', 9)->count(),
                    Pemesanan::whereMonth('date', 10)->count(),
                    Pemesanan::whereMonth('date', 11)->count(),
                    Pemesanan::whereMonth('date', 12)->count(),
                ],
                'backgroundColor' => 'rgba(255, 99, 132, 0.8)',
                'borderColor' => 'rgb(255, 99, 132)',
                'borderRadius' => 5,
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
        return 'bar';
    }
}

