<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordersData = [

            [

                'customer_name' => 'Mario Rossi',

                'customer_address' => 'Via Roma, 123',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '123-456-7890',

                'email' => 'mario@example.com',

                'status' => true,

            ],

            [

                'customer_name' => 'Anna Bianchi',

                'customer_address' => 'Piazza Garibaldi, 45',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '987-654-3210',

                'email' => 'anna@example.com',

                'status' => false,

            ],

            [

                'customer_name' => 'Luigi Verdi',

                'customer_address' => 'Via Milano, 78',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '456-789-0123',

                'email' => 'luigi@example.com',

                'status' => true,

            ],

            [

                'customer_name' => 'Giovanna Gialli',

                'customer_address' => 'Corso Vittorio Emanuele, 56',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '789-012-3456',

                'email' => 'giovanna@example.com',

                'status' => false,

            ],

            [

                'customer_name' => 'Paolo Neri',

                'customer_address' => 'Lungomare Kennedy, 12',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '234-567-8901',

                'email' => 'paolo@example.com',

                'status' => true,

            ],

            [

                'customer_name' => 'Laura Rossini',

                'customer_address' => 'Via Montepulciano, 34',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '567-890-1234',

                'email' => 'laura@example.com',

                'status' => true,

            ],

            [

                'customer_name' => 'Simone Ferrari',

                'customer_address' => 'Piazza Dante, 21',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '890-123-4567',

                'email' => 'simone@example.com',

                'status' => false,

            ],

            [

                'customer_name' => 'Elena Conti',

                'customer_address' => 'Via della Repubblica, 7',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '345-678-9012',

                'email' => 'elena@example.com',

                'status' => true,

            ],

            [

                'customer_name' => 'Carlo Mancini',

                'customer_address' => 'Corso Cavour, 88',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '678-901-2345',

                'email' => 'carlo@example.com',

                'status' => false,

            ],

            [

                'customer_name' => 'Sofia Rossi',

                'customer_address' => 'Via Vesuvio, 123',

                'time' => now(),

                'total_price' => 0,

                'phone_number' => '901-234-5678',

                'email' => 'sofia@example.com',

                'status' => true,

            ],

        ];

        foreach ($ordersData as $order) {
            Order::create($order);
        };
}
}
