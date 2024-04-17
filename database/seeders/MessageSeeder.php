<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages=[
            [
                'id'=>1,
                'sender_id'=>2,
                'receiver_id'=>4,
                'text'=> 'Salut acesta este un message din seeder!',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
