<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishesData = include base_path('database/DishData.php');
        $userIncrement = 0; // Inizializziamo la variabile per l'incremento di user_id

        for ($i = 0; $i < 8; $i++) {
            foreach ($dishesData as $dish) {
                // Incrementa user_id
                $dish['user_id'] += $userIncrement;
                Dish::create($dish);
            }
            $userIncrement += 10; // Aumenta user_id di 10 ad ogni iterazione
        }
    }
}
