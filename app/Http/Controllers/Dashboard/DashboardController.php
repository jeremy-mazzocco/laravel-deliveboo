<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Type;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.section.home-user');
    }

    public function create()
    {
        $types = Type::all();

        return view('dashboard.section.dish-create', compact('types'));
    }

    public function store(Request $request) {

        $data = $request -> all();
        $userId = Auth :: user()->id;

        $data ['user_id'] = $userId;

        /* $img_path = Storage :: put('uploads', $data['img']);
        $data['img'] = $img_path; */

        $dish = Dish :: create($data);
        /* $dish -> technologies() -> attach($data['technologies']); */

        return redirect() -> route('dashboard.section.dish-show');
    }
}
