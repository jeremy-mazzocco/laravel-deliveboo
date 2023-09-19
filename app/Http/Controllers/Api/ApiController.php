<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;
use App\Mail\NewOrderMail;
use App\Mail\NewRequestOrderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function typeList()
    {
        $types = Type::all();
        // $restaurant = User::all();
        $restaurant = User::with('types')->limit(10)->get();

        return response()->json([
            'types' => $types,
            'restaurant' => $restaurant,
        ]);
    }

    public function restaurantList($typeIds)
    {
        $typeIdsArray = explode(',', $typeIds);

        $restaurant = User::with('types')
            ->whereIn('users.id', function ($query) use ($typeIdsArray) {
                $query->select('user_id')
                    ->from('type_user')
                    ->whereIn('type_id', $typeIdsArray)
                    ->groupBy('user_id')
                    ->havingRaw('COUNT(DISTINCT type_id) = ?', [count($typeIdsArray)]);
            })
            ->get();

        return response()->json(['restaurant' => $restaurant]);
    }

    public function dishesList($id)
    {
        $dishes = Dish::where('user_id', $id)->get();
        $restaurantSelected = User::findOrFail($id);
        return response()->json([
            'dishes' => $dishes,
            'restaurantSelected' => $restaurantSelected,
        ]);
    }

    //store order
    public function storeOrder(Request $request)
    {

        $data = $request->all();
        // Creare l'ordine senza includere i dati dei piatti
        $newOrder = Order::create([
            'order_code' =>  $data['order_code'],
            'customer_name' => $data['customer_name'],
            'customer_address' => $data['customer_adress'],
            'email' => $data['email'],
            'status' => $data['status'],
            'phone_number' => $data['phone_number'],
            'total_price' => $data['total_price'],
        ]);

        // Attach i piatti con la quantità
        foreach ($data['dishes'] as $dishData) {
            $dishID = $dishData['dish_id'];
            $newOrder->dishes()->attach($dishData['dish_id'], ['amount' => $dishData['amount']]);
        }

        // Prendi User usano user_id
        $dish = $newOrder->dishes()->where('dish_id', $dishData['dish_id'])->first();
        $userID = $dish->user_id;
        $user = User::findOrFail($userID);


        Mail::to($data['email'])->send(new NewOrderMail($newOrder, $user));
        Mail::to($user['email'])->send(new NewRequestOrderMail($newOrder, $user));

        return response()->json([
            'success' => true,
            'order' => $newOrder,

        ]);
    }
}
