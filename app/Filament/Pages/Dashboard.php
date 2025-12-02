<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use App\Filament\Resources\Barangs\Widgets\BarangOverview;
use App\Filament\Resources\Customers\Widgets\CustomerOverview;
use App\Filament\Widgets\OverviewStats;
use App\Filament\Widgets\BarangChartWidget;
use App\Filament\Widgets\PeminjamanChartWidget;
use App\Filament\Widgets\LogPeminjamanWidget;
use App\Filament\Widgets\BarangSeringDipinjamWidget;

class Dashboard extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-home';
    protected string $view = 'filament.pages.dashboard';

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OverviewStats::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            BarangChartWidget::class,
            PeminjamanChartWidget::class,
            LogPeminjamanWidget::class,
            BarangSeringDipinjamWidget::class,
        ];
    }
}
