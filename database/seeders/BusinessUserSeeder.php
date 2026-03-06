<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class BusinessUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $user->businesses()->attach(1,[ 'role' => 'owner'
            
        ]);

        $user->businesses()->attach(2,[ 'role' => 'admin'
        ]);

        $user2 = User::find(2);
        $user2->businesses()->attach(1, [ 'role' => 'operator'
        ]);
    }
}
