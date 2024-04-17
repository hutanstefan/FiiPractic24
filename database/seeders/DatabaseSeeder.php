<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
