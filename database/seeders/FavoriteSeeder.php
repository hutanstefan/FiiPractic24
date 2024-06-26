<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $favorites = [
            ['user_id' => 2, 'product_id' => 1],
            ['user_id' => 2, 'product_id' => 2],
            ['user_id' => 3, 'product_id' => 3],
        ];

        DB::table('favorite_product_user')->insert($favorites);
    }
}
