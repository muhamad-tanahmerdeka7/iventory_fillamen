<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class StockCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Stock per Category';

    protected static ?int $sort = 2;
 // Urutan di bawah KPI Tiles

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Total Quantity',
                    'data' => [120, 350, 420, 210, 90], // Data dummy
                    'backgroundColor' => '#0A6ED1', // Warna SAP Blue
                ],
            ],
            'labels' => ['Raw Material', 'Packaging', 'Sparepart', 'Consumable', 'Finished Goods'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}