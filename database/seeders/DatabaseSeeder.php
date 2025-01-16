<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Employee::factory(100)->create();

        User::factory()->create([
            'name' => 'OCS Admin',
            'email' => 'admin@ocs.com',
        ]);

        User::factory()->create([
            'name' => 'OCS USer',
            'email' => 'user@ocs.com',
        ]);
    }
}
