<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews=[
            [
                'id' => 1,
                'content' => 'Good!',
                'score' => 3,
                'user_id' => 2,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            'id' => 2,
            'content' => 'Review2!',
            'score' => 5,
            'user_id' => 3,
            'product_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
