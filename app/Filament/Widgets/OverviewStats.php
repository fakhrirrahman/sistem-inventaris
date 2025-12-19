<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Peminjaman;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class OverviewStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Barang', Barang::count())
                ->description('Jumlah keseluruhan barang dalam inventaris')
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('primary'),
            // Stat::make('Total Customer', Customer::count())
            //     ->description('Jumlah keseluruhan customer')
            //     ->descriptionIcon('heroicon-o-users')
            //     ->color('success'),
            Stat::make('Jumlah Barang Terpinjam', Peminjaman::whereNotNull('tanggal_pinjam')->count())
                ->description('Jumlah barang yang sedang dipinjam')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('warning'),
            Stat::make('Jumlah Barang Yang Sudah Kembali', Peminjaman::whereNotNull('tanggal_kembali')->count())
                ->description('Jumlah barang yang sudah dikembalikan')
                ->descriptionIcon('heroicon-o-check')
                ->color('danger'),
        ];
    }
}