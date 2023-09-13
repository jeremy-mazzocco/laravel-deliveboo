<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Psy\debug;

class ApiController extends Controller
{
    public function mountedData()
    {
        $types = Type::all();
        $pivotData = DB::table('type_user')->get();

        return response()->json([
            'types' => $types,
            'pivotData' => $pivotData
        ]);
    }

    public function restaurantList(Request $request)
    {
        $userIds = $request->input('data');

        $users = User::whereIn('id', $userIds)->get();

        return response()->json(['users' => $users]);
    }
}
