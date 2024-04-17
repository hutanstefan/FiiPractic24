<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'cloudlab',
                'email' => 'cloudlab@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2024-04-12 13:23:08',
                'updated_at' => '2024-04-12 13:23:08',
                'type' => 'admin'
            ],
            [
            'id' => 2,
            'name' => 'Buyer1',
            'email' => 'buyer1@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => '2024-04-12 13:23:08',
            'updated_at' => '2024-04-12 13:23:08',
            'type' => 'buyer'
            ],
            [
                'id' => 3,
                'name' => 'Buyer2',
                'email' => 'buyer2@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2024-04-12 13:23:08',
                'updated_at' => '2024-04-12 13:23:08',
                'type' => 'buyer'
            ],
            [
                'id' => 4,
                'name' => 'Seller1',
                'email' => 'seller1@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2024-04-12 13:23:08',
                'updated_at' => '2024-04-12 13:23:08',
                'type' => 'seller'
            ],
            [
                'id' => 5,
                'name' => 'Seller2',
                'email' => 'seller2@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2024-04-12 13:23:08',
                'updated_at' => '2024-04-12 13:23:08',
                'type' => 'seller'
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

    }
}
