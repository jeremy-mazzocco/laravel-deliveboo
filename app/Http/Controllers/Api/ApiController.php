<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function typeList()
    {
        $types = Type::all();

        return response()->json([
            'types' => $types
        ]);
    }
}
