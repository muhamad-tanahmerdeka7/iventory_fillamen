<?php

namespace App\Filament\Resources\ProductionOrders;

use App\Filament\Resources\ProductionOrders\Pages\CreateProductionOrder;
use App\Filament\Resources\ProductionOrders\Pages\EditProductionOrder;
use App\Filament\Resources\ProductionOrders\Pages\ListProductionOrders;
use App\Filament\Resources\ProductionOrders\Schemas\ProductionOrderForm;
use App\Filament\Resources\ProductionOrders\Tables\ProductionOrdersTable;
use App\Models\ProductionOrder;
use BackedEnum;
use UnitEnum; // 1. Import UnitEnum ditambahkan
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductionOrderResource extends Resource
{
    protected static ?string $model = ProductionOrder::class;

    // Icon menu di sidebar
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // 2. Tipe data diperbaiki menjadi string|UnitEnum|null
    protected static string|UnitEnum|null $navigationGroup = 'Transaction';
    
    // (Opsional) Mengatur urutan menu
    protected static ?int $navigationSort = 1; 

    public static function form(Schema $schema): Schema
    {
        // Memanggil class form yang sudah kita buat sebelumnya
        return ProductionOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // Memanggil class table yang sudah kita buat sebelumnya
        return ProductionOrdersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // Nanti kita akan mendaftarkan ProductionBatchesRelationManager di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductionOrders::route('/'),
            'create' => CreateProductionOrder::route('/create'),
            'edit' => EditProductionOrder::route('/{record}/edit'),
        ];
    }
}