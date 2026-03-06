<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business :: create([
            'name' => 'Toko A'
        ]);

        Business :: create ([
            'name' => 'Toko Sembako'
        ]);

        Business :: create ([
            'name' => 'Toko Elektronik'
        ]);
    }
}
