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
        $dishesData = [

            [

                'dish_name' => 'Pizza Margherita',

                'description' => 'Pizza classica con pomodoro, mozzarella e basilico.',

                'price' => 8.99,

                'img' => 'pizza_margherita.jpg',

                'visibility' => true,

                'user_id' => 1

            ],

            [

                'dish_name' => 'Spaghetti alla Carbonara',

                'description' => 'Spaghetti con uova, pancetta, pecorino e pepe nero.',

                'price' => 12.99,

                'img' => 'spaghetti_carbonara.jpg',

                'visibility' => true,

                'user_id' => 2

            ],

            [

                'dish_name' => 'Lasagna al Forno',

                'description' => 'Lasagna con carne, besciamella e formaggio fuso.',

                'price' => 10.99,

                'img' => 'lasagna_al_forno.jpg',

                'visibility' => true,

                'user_id' => 3

            ],

            [

                'dish_name' => 'Insalata Caprese',

                'description' => "Insalata con pomodoro, mozzarella, basilico e olio d'oliva.",

                'price' => 7.99,

                'img' => 'insalata_caprese.jpg',

                'visibility' => true,

                'user_id' => 4

            ],

            [

                'dish_name' => 'Risotto ai Funghi',

                'description' => 'Risotto con funghi porcini e formaggio Parmigiano.',

                'price' => 14.99,

                'img' => 'risotto_funghi.jpg',

                'visibility' => true,

                'user_id' => 5

            ],

            [

                'dish_name' => 'Filetto di Salmone Grigliato',

                'description' => 'Filetto di salmone grigliato servito con salsa al limone.',

                'price' => 16.99,

                'img' => 'filetto_di_salmone.jpg',

                'visibility' => true,

                'user_id' => 6,
            ],

            [

                'dish_name' => 'Tagliatelle al Tartufo',

                'description' => 'Tagliatelle fresche con crema di tartufo nero.',

                'price' => 18.99,

                'img' => 'tagliatelle_tartufo.jpg',

                'visibility' => true,

                'user_id' => 7

            ],

            [

                'dish_name' => 'Bistecca alla Fiorentina',

                'description' => 'Bistecca alla griglia servita con contorni misti.',

                'price' => 22.99,

                'img' => 'bistecca_fiorentina.jpg',

                'visibility' => true,

                'user_id' => 8,

            ],

            [

                'dish_name' => 'Carpaccio di Manzo',

                'description' => 'Sottili fette di manzo marinato con rucola e Parmigiano.',

                'price' => 11.99,

                'img' => 'carpaccio_manzo.jpg',

                'visibility' => true,

                'user_id' => 9,

            ],

            [

                'dish_name' => 'Gnocchi al Gorgonzola',

                'description' => 'Gnocchi di patate con salsa al gorgonzola e noci.',

                'price' => 13.99,

                'img' => 'gnocchi_gorgonzola.jpg',

                'visibility' => false,

                'user_id' => 10
            ],

            [

                'dish_name' => 'Tiramisù',

                'description' => 'Il classico dolce italiano al caffè e mascarpone.',

                'price' => 6.99,

                'img' => 'tiramisu.jpg',

                'visibility' => true,

                'user_id' => 1

            ],

            [

                'dish_name' => 'Tagliolini al Limone',

                'description' => 'Tagliolini freschi con crema al limone e prezzemolo.',

                'price' => 12.99,

                'img' => 'tagliolini_limone.jpg',

                'visibility' => true,

                'user_id' => 2

            ],

            [

                'dish_name' => 'Cannoli Siciliani',

                'description' => 'Cannoli siciliani ripieni di ricotta e cioccolato.',

                'price' => 9.99,

                'img' => 'cannoli_siciliani.jpg',

                'visibility' => true,

                'user_id' => 3,

            ],

            [

                'dish_name' => 'Cotoletta alla Milanese',

                'description' => 'Cotoletta di pollo impanata e fritta, servita con limone.',

                'price' => 15.99,

                'img' => 'cotoletta_milanese.jpg',

                'visibility' => true,

                'user_id' => 4,

            ],

            [

                'dish_name' => 'Sushi Misto',

                'description' => 'Assortimento di sushi con nigiri, maki e sashimi.',

                'price' => 19.99,

                'img' => 'sushi_misto.jpg',

                'visibility' => true,

                'user_id' => 5

            ],

            [

                'dish_name' => 'Pasta al Pesto',

                'description' => 'Pasta con salsa al pesto, basilico, pinoli e formaggio.',

                'price' => 10.99,

                'img' => 'pasta_pesto.jpg',

                'visibility' => true,

                'user_id' => 6

            ],

            [

                'dish_name' => "Gamberi all'Aglio",

                'description' => 'Gamberi saltati in padella con aglio e prezzemolo.',

                'price' => 16.99,

                'img' => 'gamberi_aglio.jpg',

                'visibility' => true,

                'user_id' => 7

            ],

            [

                'dish_name' => 'Tartare di Salmone',

                'description' => 'Tartare di salmone fresco con avocado e lime.',

                'price' => 14.99,

                'img' => 'tartare_salmone.jpg',

                'visibility' => true,

                'user_id' => 8

            ],

            [

                'dish_name' => 'Panna Cotta',

                'description' => 'Dolce italiano con crema di vaniglia e salsa di frutti di bosco.',

                'price' => 7.99,

                'img' => 'panna_cotta.jpg',

                'visibility' => true,

                'user_id' => 9

            ],

            [

                'dish_name' => "Rigatoni all'Arrabbiata",

                'description' => 'Rigatoni con salsa all\'arrabbiata e peperoncino.',

                'price' => 11.99,

                'img' => 'rigatoni_arrabbiata.jpg',

                'visibility' => true,

                'user_id' => 10

            ],

        ];

        foreach ($dishesData as $dish) {
            Dish::create($dish);
        };


    }
}
