<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class OverviewStats extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = [
            Stat::make('Total Barang', Barang::count())
                ->description('Jumlah keseluruhan barang dalam inventaris')
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('primary'),

            Stat::make(
                'Jumlah Barang Terpinjam',
                Peminjaman::when(
                    !auth()->user()->hasRole('SuperAdmin'),
                    fn($query) => $query->where('user_id', auth()->id())
                )->whereNotNull('tanggal_pinjam')->count()
            )
                ->description('Jumlah barang yang sedang dipinjam')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('warning'),

            Stat::make(
                'Jumlah Barang Yang Sudah Kembali',
                Peminjaman::when(
                    !auth()->user()->hasRole('SuperAdmin'),
                    fn($query) => $query->where('user_id', auth()->id())
                )->whereNotNull('tanggal_kembali')->count()
            )
                ->description('Jumlah barang yang sudah dikembalikan')
                ->descriptionIcon('heroicon-o-check')
                ->color('danger'),
        ];

        if (auth()->user()->hasRole('SuperAdmin')) {
            $stats[] =
                Stat::make('Total Customer', User::count())
                ->description('Jumlah keseluruhan customer')
                ->descriptionIcon('heroicon-o-users')
                ->color('success');
        }

        return $stats;
    }
}
