<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Dosen', '14')
            ->description('Jumlah Dosen'),
        Stat::make('Matakuliah', '22')
            ->description('Total Matakuliah'),
        Stat::make('RPS', '1')
            ->description('Jumlah RPS'),
        Stat::make('RPS Disetujui', '1')
            ->description('Total Matakuliah'),
        ];
    }
}
