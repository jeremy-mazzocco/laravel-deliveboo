<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dish_OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $orders = Order::all();
        $randomUserId = 1;

        foreach ($orders as $order) {

            $dishes = Dish::where('user_id', $randomUserId)->limit(rand(1, 6))->get();

            $totalPrice = 0;

            foreach ($dishes as $dish) {
                $amount = rand(1, 5);
                $dishPrice = $dish->price;
                $partialPrice = $dishPrice * $amount;
                $totalPrice += $partialPrice;

                DB::table('dish_order')->insert([
                    'order_id' => $order->id,
                    'dish_id' => $dish->id,
                    'amount' => $amount,
                ]);
            }

            $order->total_price = $totalPrice;
            $order->save();

            $randomUserId++;
            if ($randomUserId > 10) {
                $randomUserId = 1;
            }
        }
    }
}
