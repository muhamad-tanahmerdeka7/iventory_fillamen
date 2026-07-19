<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Information')
                    ->schema([
                        TextInput::make('product_order')
                            ->label('Product Order')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                            // columnSpan(1) bisa dihapus karena secara default akan mengambil 1 kolom

                        TextInput::make('product_name')
                            ->label('Product Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('material')
                            ->label('Material')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('uom')
                            ->label('UOM (Unit of Measure)')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(3), // <-- Ubah angka 2 menjadi 4 di sini
            ]);
    }
}