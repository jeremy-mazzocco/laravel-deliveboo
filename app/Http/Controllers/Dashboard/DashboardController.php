<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dish;
use Illuminate\Http\Request;

// importazione di Auth per usare Auth::user()
// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.section.home-user');
    }
    public function show()
    {
        // accedo all'id dell'user loggato
        // $userId = Auth::user()->id;
        // cerco il piatto dove user_id è uguale all'id dell'user loggato
        // $dishes = Dish::where('user_id', $userId)->get();

        return view('dashboard.section.dish-show');
    }
}
