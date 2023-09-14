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

    public function restaurantList($typeIds){
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



    public function dishesList($id) {
        $dishes = Dish::where('user_id', $id)->get();
        $restaurantSelected = User::findOrFail($id);
        return response()->json([
            'dishes' => $dishes,
            'restaurantSelected' => $restaurantSelected,
        ]);
    }

}
