<?php

namespace App\Filament\Resources\ProductionOrders\Schemas;

use App\Models\Product;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
 // 1. Tambahkan import Set

class ProductionOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('production_date')
                    ->label('Date Production')
                    ->default(now())
                    ->required(),

                Select::make('product_id')
                    ->label('Product Name')
                    // 2. Perbaikan performa: langsung pluck dari query, jangan gunakan all()
                    ->options(Product::pluck('product_name', 'id'))
                    ->searchable()
                    ->required()
                    ->live() 
                    // 3. Ubah 'callable' menjadi class 'Set' milik Filament
                    ->afterStateUpdated(function ($state, Set $set) {
                        if ($state) {
                            $product = Product::where('id', $state)->first();
                            
                            if ($product) {
                                $set('material', $product->material);
                                $set('uom', $product->uom);
                            }
                        } else {
                            $set('material', null);
                            $set('uom', null);
                        }
                    }), 

                TextInput::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                TextInput::make('material')
                    ->label('Material')
                    ->disabled() 
                    ->dehydrated(false), 

                TextInput::make('uom')
                    ->label('UoM')
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }
}