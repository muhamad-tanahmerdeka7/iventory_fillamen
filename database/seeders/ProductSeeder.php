<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_order' => '1100016029', // Anda wajib mengisi ini karena di migration tidak nullable
            'product_name'  => 'CHICKEN TERIYAKI 1KG',
            'material'      => 'C-00191',
            'uom'           => 'KG',
        ]);
    }
}