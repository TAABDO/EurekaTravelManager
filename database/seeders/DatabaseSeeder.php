<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $user1= User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ]);
        $user2= User::factory()->create([
            'name' => 'Driver',
            'email' => 'driver@mail.com',
        ]);
        
        $role = ModelsRole::create(['name' => 'Admin']);
        $user1->assignRole($role);
       

    }
}
