<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::factory()->count(10)->create();
        Owner::factory([
            'first_name' => 'V',
            'last_name' => 'A',
            'phone_number' => '123456789',
            'email' => 'vaneath@gmail.com',
        ])->create();
    }
}
