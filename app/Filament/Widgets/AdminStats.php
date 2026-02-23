<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Customer;
use App\Models\Dokter;
use App\Models\FormAppointment;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Pembayaran;

class AdminStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Customer', Customer::count())
                ->description('Pengguna Terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),

            Stat::make('Total Dokter', Dokter::count())
                ->description('Dokter Aktif')
                ->descriptionIcon('heroicon-m-user-circle')
                ->chart([3, 5, 2, 8, 4, 9, 10])
                ->color('success'),

            Stat::make('Appointments', FormAppointment::count())
                ->description('Janji Konsultasi')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart([10, 15, 8, 12, 19, 14, 25])
                ->color('warning'),

            Stat::make('Pemesanan', Pemesanan::count())
                ->description('Total Order')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->chart([5, 10, 8, 15, 12, 20, 18])
                ->color('info'),

            Stat::make('Produk', Produk::count())
                ->description('Produk Kesehatan')
                ->descriptionIcon('heroicon-m-beaker')
                ->chart([15, 18, 15, 18, 16, 18, 18])
                ->color('danger'),

            Stat::make('Pembayaran', Pembayaran::count())
                ->description('Transaksi Berhasil')
                ->descriptionIcon('heroicon-m-credit-card')
                ->chart([1, 4, 2, 6, 3, 8, 7])
                ->color('success'),
        ];
    }
}

