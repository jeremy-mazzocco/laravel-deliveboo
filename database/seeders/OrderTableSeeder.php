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
        // $OrdersData = include base_path('database/OrderData.php');

        // foreach ($ordersData as $order) {
        //     Order::create($order);
        // };
        Order :: factory() -> count(1000) -> create();
}
}
