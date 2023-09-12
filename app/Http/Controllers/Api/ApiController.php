<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
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

    public function restaurantList($id)
    {

        // $typeIds = explode(',', $id);

        // $type = Type::find($typeIds);
        // $users = $type->users;
        // return response()->json(['users' => $users]);

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
