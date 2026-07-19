<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_order' => '1100016029',
                'product_name'  => 'CHICKEN TERIYAKI 1KG',
                'material'      => 'C-00191',
                'uom'           => 'KG',
            ],
            [
                'product_order' => '1100016030',
                'product_name'  => 'BEEF TERIYAKI 1KG',
                'material'      => 'B-00245',
                'uom'           => 'KG',
            ],
            [
                'product_order' => '1100016031',
                'product_name'  => 'CHICKEN YAKINIKU 1KG',
                'material'      => 'C-00252',
                'uom'           => 'KG',
            ],
            [
                'product_order' => '1100016032',
                'product_name'  => 'SAUCE TERIYAKI',
                'material'      => 'S-00101',
                'uom'           => 'PCS',
            ],
            [
                'product_order' => '1100016033',
                'product_name'  => 'CHICKEN KATSU',
                'material'      => 'C-00194',
                'uom'           => 'KG',
            ],
            [
                'product_order' => '1100016034',
                'product_name'  => 'SAUCE ERA',
                'material'      => 'E-00040',
                'uom'           => 'PACK',
            ],
            [
                'product_order' => '1100016035',
                'product_name'  => 'BASO UDANG',
                'material'      => 'C-00195',
                'uom'           => 'PACK',
            ],
             [
                'product_order' => '1100016036',
                'product_name'  => 'TORI NO TEBA',
                'material'      => 'T-00257',
                'uom'           => 'PACK',
            ],
        ];

        // Mencegah data ganda berdasarkan product_order
        Product::upsert(
            $products,
            ['product_order'], // kolom unik
            ['product_name', 'material', 'uom'] // kolom yang di-update jika sudah ada
        );
    }
}