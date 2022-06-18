<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Tag;
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
        Category::factory(10)->has(Advertisement::factory()->count(3)->has(Tag::factory()->count(2)))
        ->has(Advertisement::factory()->featured()->count(1)->has(Tag::factory()->count(2)))->create();
    }
}
