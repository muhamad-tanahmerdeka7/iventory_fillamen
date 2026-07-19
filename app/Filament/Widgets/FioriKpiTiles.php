<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Material;
use App\Models\PurchaseOrder;
use App\Models\Customer;

class FioriKpiTiles extends BaseWidget
{
    // Mengatur agar widget full width (mengisi grid)
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Materials', '1,240') // Ganti dengan Material::count() nanti
                ->description('Master Data Inventory')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'fiori-tile', // Class CSS kustom untuk Fiori
                ]),

            Stat::make('Pending PO', '14') // Ganti dengan query PO pending
                ->description('Menunggu Approval')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->extraAttributes([
                    'class' => 'fiori-tile',
                ]),

            Stat::make('Low Stock Alerts', '5')
                ->description('Material di bawah minimum')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger')
                ->chart([7, 3, 4, 5, 6, 3, 5]) // Contoh sparkline grafik kecil ala Fiori
                ->extraAttributes([
                    'class' => 'fiori-tile',
                ]),

            Stat::make('Active Customers', '85')
                ->description('Partner Bisnis')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->extraAttributes([
                    'class' => 'fiori-tile',
                ]),
        ];
    }
}