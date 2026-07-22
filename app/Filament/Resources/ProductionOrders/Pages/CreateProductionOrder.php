<?php

namespace App\Filament\Resources\ProductionOrders\Pages;

use App\Filament\Resources\ProductionOrders\ProductionOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductionOrder extends CreateRecord
{
    protected static string $resource = ProductionOrderResource::class;
    
    // Tambahkan method ini agar setelah create langsung kembali ke tabel
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}