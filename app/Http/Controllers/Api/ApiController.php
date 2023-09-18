<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;
use App\Mail\NewOrderMail;
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
            'customer_name' => $data['customer_name'],
            'customer_address' => $data['customer_adress'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'total_price' => $data['total_price'],
        ]);

        // Attach i piatti con la quantità
        foreach ($data['dishes'] as $dishData) {
            $dishID = $dishData['dish_id'];
            $newOrder->dishes()->attach($dishData['dish_id'], ['amount' => $dishData['amount']]);
        }

        $userID = $data['userID'];
        $user = User::findOrFail($userID);

        Mail::to($data['email'])->send(new NewOrderMail($newOrder));


        return response()->json([
            'success' => true,
            'order' => $newOrder,

        ])->view('mail.newordermail', compact('newOrder', 'user'));
    }

    // public function restaurantList($id)
    // {

    //     $typeIds = explode(',', $id);

    //     // Esegui la query per ottenere gli utenti che hanno TUTTE le tipologie specificate
    //     $users = User::where(function ($query) use ($typeIds) {
    //         foreach ($typeIds as $typeId) {
    //             $query->whereHas('type_id', function ($subquery) use ($typeId) {
    //                 $subquery->where('id', $typeId);
    //             });
    //         }
    //     })->get();

    //     return response()->json(['users' => $users]);
    // }
}
