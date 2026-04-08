<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = new Role();
        $role->name = 'Admin';
        $role->slug = 'admin';
        $role->save();

        $role = new Role();
        $role->name = 'User';
        $role->slug = 'user';
        $role->save();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'id_role' => 1,
            'password' => bcrypt('password'),
        ]);

        Products::factory()->count(25)->create();
    }
}
