<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use App\Filament\Resources\Barangs\Widgets\BarangOverview;
use App\Filament\Resources\Customers\Widgets\CustomerOverview;
use App\Filament\Widgets\OverviewStats;

class Dashboard extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-home';
    protected string $view = 'filament.pages.dashboard';

     protected function getColumns(): int
    {
        return 2; // Biar 2 kolom dan tampil berjajar
    }
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
        return [];
    }
}
