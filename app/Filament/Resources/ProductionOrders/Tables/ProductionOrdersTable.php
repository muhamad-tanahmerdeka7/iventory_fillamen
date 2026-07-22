<?php

namespace App\Filament\Resources\ProductionOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductionOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('production_date')
                    ->label('Date Production')
                    ->date('d M Y')
                    ->sortable(),

                // Mengambil product_name melalui relasi product() di Model ProductionOrder
                TextColumn::make('product.product_name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),

                // Mengambil material melalui relasi product()
                TextColumn::make('product.material')
                    ->label('Material')
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->sortable(),

                // Mengambil uom melalui relasi product() dan memberinya desain badge
                TextColumn::make('product.uom')
                    ->label('UoM')
                    ->badge(),
            ])
            ->filters([
                // Anda bisa menambahkan filter tanggal di sini nantinya
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}