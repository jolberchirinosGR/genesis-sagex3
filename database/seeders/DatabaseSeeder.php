<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Empresa;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Proveedor::factory(10)->create();

        Empresa::factory(10)->create();

        User::factory()->create([
            'name' => 'Jolber Chirinos',
            'email' => 'jolberchirinos@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
