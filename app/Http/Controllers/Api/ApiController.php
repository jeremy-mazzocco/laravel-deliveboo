<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use App\Models\Dish;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function typeList()
    {
        $types = Type::all();
        // $restaurant = User::all();
        $restaurant = User::with('types')->get();

        return response()->json([
            'types' => $types,
            'restaurant' => $restaurant,
        ]);
    }

    public function dishesList($id) {
        $dishes = Dish::where('user_id', $id)->get();
        $restaurantSelected = User::findOrFail($id);
        return response()->json([
            'dishes' => $dishes,
            'restaurantSelected' => $restaurantSelected,
        ]);
    }

    public function restaurantList($id)
    {

        $typeIds = explode(',', $id);

        // Esegui la query per ottenere gli utenti che hanno TUTTE le tipologie specificate
        $users = User::where(function ($query) use ($typeIds) {
            foreach ($typeIds as $typeId) {
                $query->whereHas('type_id', function ($subquery) use ($typeId) {
                    $subquery->where('id', $typeId);
                });
            }
        })->get();

        return response()->json(['users' => $users]);
    }
}
