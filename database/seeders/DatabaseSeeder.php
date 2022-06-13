<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creating Admin
        User::factory()->admin()->create([
            'email' => 'admin@users.test',
        ]);
        // Creating User
        User::factory()->create([
            'email' => 'user@users.test',
        ]);
        // Creating Advertisments with Users
        Advertisement::factory(10)->create();
        Advertisement::factory(5)->featured()->create();
    }
}
