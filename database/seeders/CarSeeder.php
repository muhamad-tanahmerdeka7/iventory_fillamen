<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::insert([
            [
                'code' => 'CAR-0001',
                'plate_number' => 'B 1234 XYZ',
                'driver_name' => 'Andi Saputra',
                'phone' => '081234567890',
                'status' => 'Standby',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CAR-0002',
                'plate_number' => 'B 5678 ABC',
                'driver_name' => 'Budi Santoso',
                'phone' => '081298765432',
                'status' => 'Delivery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CAR-0003',
                'plate_number' => 'B 9876 DEF',
                'driver_name' => 'Rudi Hidayat',
                'phone' => '081355566677',
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}