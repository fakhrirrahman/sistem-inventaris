<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PeminjamanChartWidget extends ChartWidget
{
    protected ?string $heading = 'Statistik Peminjaman Barang';

    protected function getData(): array
    {
        $peminjamanPerBarang = DB::table('peminjaman')
            ->join('barang', 'peminjaman.barang_id', '=', 'barang.id')
            ->when(
                !auth()->user()->hasRole('SuperAdmin'),
                fn($query) => $query->where('peminjaman.user_id', auth()->id())
            )
            ->select('barang.nama_barang', DB::raw('count(*) as total'))
            ->groupBy('barang.nama_barang')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Peminjaman',
                    'data' => $peminjamanPerBarang->pluck('total')->toArray(),
                    'backgroundColor' => '#10B981',
                    'borderColor' => '#059669',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $peminjamanPerBarang->pluck('nama_barang')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
