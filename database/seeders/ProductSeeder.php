<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products=[
            ['id' => 1,
            'name' => 'Iphone',
            'description' => 'Performanța nu este doar o promisiune, ci o realitate. Echipat cu cel mai recent procesor de vârf și memorie RAM generoasă, acest telefon îți oferă puterea și viteza de care ai nevoie pentru a rula aplicațiile tale preferate fără nicio întârziere. De la multitasking la gaming intens, acest telefon poate face față cu ușurință cerințelor tale. Fotografia și videografia devin o experiență remarcabilă cu sistemul nostru de camere de înaltă performanță. Camera principală captură detalii incredibile în orice condiții de iluminare, iar camera frontală te ajută să obții selfie-uri perfecte, fie că ești într-o lumină naturală sau într-un mediu slab luminat. Cu o baterie de lungă durată și tehnologie de încărcare rapidă, vei rămâne conectat întreaga zi fără griji. Iar cu caracteristici avansate de securitate și confidențialitate, poți avea încredere că datele tale sunt întotdeauna protejate. Descoperă o nouă dimensiune a conectivității și a performanței mobile cu telefonul nostru de top. Acesta nu este doar un telefon, ci un partener pentru fiecare aspect al vieții tale digitale.',
            'price' => 100.00,
            'location' => 'Iasi',
            'type' => 'Electronics',
            'telephone' => '0734346414',
            'image' => '1713012593.png',
            'verified' => true,
            'hidden' => false,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 4,
            ],
            ['id' => 2,
                'name' => 'Cat',
                'description' => 'Cat with glasses',
                'price' => 20.00,
                'location' => 'Iasi',
                'type' => 'Animals',
                'telephone' => '0734346414',
                'image' => '1713017256.jpg',
                'verified' => true,
                'hidden' => false,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 4,
            ],
            ['id' => 3,
                'name' => 'Hamster',
                'description' => 'Cute hamster',
                'price' => 10.00,
                'location' => 'Iasi',
                'type' => 'Animals',
                'telephone' => '0734346414',
                'image' => '1713216160.jpg',
                'verified' => false,
                'hidden' => false,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 4,
            ],
            ['id' => 4,
                'name' => 'Jordan',
                'description' => 'Shoes',
                'price' => 2000.00,
                'location' => 'Iasi',
                'type' => 'Clothes',
                'telephone' => '0734346414',
                'image' => '1713364439.jpg',
                'verified' => true,
                'hidden' => false,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 5,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
