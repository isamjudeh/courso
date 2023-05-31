<?php

namespace Database\Seeders;

use App\Models\Registeration;
use Illuminate\Database\Seeder;

class RegisterationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registeration::factory()->count(5)->create();
    }
}
