<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typesData = [
            [
                'type_name' => 'Pizza',
                'img' => 'none'
            ],
            [
                'type_name' => 'Primi piatti',
                'img' => 'none'
            ],
            [
                'type_name' => 'Pasta',
                'img' => 'none'
            ],
            [
                'type_name' => 'Piadina',
                'img' => 'none'
            ],
            [
                'type_name' => 'Carne',
                'img' => 'none'
            ],
            [
                'type_name' => 'Pesce',
                'img' => 'none'
            ],
            [
                'type_name' => 'Vegetariano',
                'img' => 'none'
            ],
            [
                'type_name' => 'Vegano',
                'img' => 'none'
            ],
            [
                'type_name' => 'Senza glutine',
                'img' => 'none'
            ],
        ];

        foreach ($typesData as $type) {
            Type::create($type);
        };

        $restaurants = User::all();

        foreach ($restaurants as $restaurant) {
            $type = Type::inRandomOrder()->limit(rand(1,3))->get();

            $restaurant->types()->attach($type);
        }
    }
}


//         Hamburger
// Panini
// Pizza
// Americano
// Asiatico
// Barbecue
// Carne
// Cinese
// Colazione
// Dessert
// Fast-food
// Gastronomia
// Gelato
// Giapponese
// Greco
// Insalate
// Internazionale
// Italiano
// Kebab
// Mediterraneo
// Messicano
// Pasta
// Pesce
// Piadina
// Pollo
// Sano
// Senza glutine
// Snack
// Sushi
// Vegetariano
