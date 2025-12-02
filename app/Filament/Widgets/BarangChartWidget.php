<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BarangChartWidget extends ChartWidget
{
    protected ?string $heading = 'Distribusi Barang per Jenis';

    protected function getData(): array
    {
        $barangPerJenis = DB::table('barang')
            ->select('jenis_barang', DB::raw('count(*) as total'))
            ->groupBy('jenis_barang')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Barang',
                    'data' => $barangPerJenis->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#8B5CF6',
                        '#EC4899',
                        '#06B6D4',
                    ],
                    'borderColor' => '#ffffff',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $barangPerJenis->pluck('jenis_barang')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
