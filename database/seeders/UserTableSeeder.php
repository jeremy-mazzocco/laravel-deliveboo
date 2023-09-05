<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantsData = [
            [
                'restaurant_name' => 'Ristorante del Parco',
                'email' => 'info@ristorantedelparco.com',
                'address' => 'Via Roma, 123',
                'vat_number' => 'IT12345678901',
                'phone_number' => '123-456-7890',
                'password' => bcrypt('password1'),
            ],
            [
                'restaurant_name' => 'La Trattoria Italiana',
                'email' => 'info@latrattoriaitaliana.com',
                'address' => 'Piazza Garibaldi, 45',
                'vat_number' => 'IT98765432109',
                'phone_number' => '987-654-3210',
                'password' => bcrypt('password2'),
            ],
            [
                'restaurant_name' => 'Ristorante Buona Tavola',
                'email' => 'info@buonatavola.com',
                'address' => 'Via Milano, 78',
                'vat_number' => 'IT45678901234',
                'phone_number' => '456-789-0123',
                'password' => bcrypt('password3'),
            ],
            [
                'restaurant_name' => 'Pizzeria Napoli',
                'email' => 'info@pizzerianapoli.com',
                'address' => 'Corso Vittorio Emanuele, 56',
                'vat_number' => 'IT78901234567',
                'phone_number' => '789-012-3456',
                'password' => bcrypt('password4'),
            ],
            [
                'restaurant_name' => 'Sapore di Mare',
                'email' => 'info@saporedimare.com',
                'address' => 'Lungomare Kennedy, 12',
                'vat_number' => 'IT23456789012',
                'phone_number' => '234-567-8901',
                'password' => bcrypt('password5'),
            ],
            [
                'restaurant_name' => 'Osteria delle Colline',
                'email' => 'info@osteriadellecolline.com',
                'address' => 'Via Montepulciano, 34',
                'vat_number' => 'IT56789012345',
                'phone_number' => '567-890-1234',
                'password' => bcrypt('password6'),
            ],
            [
                'restaurant_name' => 'Ristorante Gusto Toscano',
                'email' => 'info@gustotoscano.com',
                'address' => 'Piazza Dante, 21',
                'vat_number' => 'IT89012345678',
                'phone_number' => '890-123-4567',
                'password' => bcrypt('password7'),
            ],
            [
                'restaurant_name' => 'Trattoria della Nonna',
                'email' => 'info@trattoriadellanonna.com',
                'address' => 'Via della Repubblica, 7',
                'vat_number' => 'IT34567890123',
                'phone_number' => '345-678-9012',
                'password' => bcrypt('password8'),
            ],
            [
                'restaurant_name' => 'Ristorante La Perla',
                'email' => 'info@ristorantelaperla.com',
                'address' => 'Corso Cavour, 88',
                'vat_number' => 'IT67890123456',
                'phone_number' => '678-901-2345',
                'password' => bcrypt('password9'),
            ],
            [
                'restaurant_name' => 'Pizzeria Bella Napoli',
                'email' => 'info@bellanapoli.com',
                'address' => 'Via Vesuvio, 123',
                'vat_number' => 'IT90123456789',
                'phone_number' => '901-234-5678',
                'password' => bcrypt('password10'),
            ],
        ];

        foreach ($restaurantsData as $restaurant) {
            User::create($restaurant);
        }
    }
}
