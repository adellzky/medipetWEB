<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Role::create([
        'role_name' => 'admin',
       ]);

       Role::create([
        'role_name' => 'customer',
       ]);

       User::factory(5)->create();

    //    User::create([
    //     'name' => 'adel',

    //    ]);
    }
}
