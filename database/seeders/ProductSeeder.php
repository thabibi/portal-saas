<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Beras',
            'price' => '12000',
            'business_id' => 1,
            'stock' =>5
        ]);

        Product::create([
            'name' => 'TV',
            'price' => '2500000',
            'business_id' =>1,
            'stock' => 5
        ]);

        Product::create ([
            'name' => 'Minyak Goreng',
            'price' => 18000,
            'business_id' =>2,
            'stock' =>5
        ]);

    }
}
