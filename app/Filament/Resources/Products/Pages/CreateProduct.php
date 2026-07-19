<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width; // <-- Menggunakan Width

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    /**
     * Tipe kembalian (return type) disesuaikan dengan Filament\Pages\BasePage
     */
    public function getMaxContentWidth(): Width | string | null
    {
        return Width::Full; // <-- Menggunakan Width::Full
    }
}