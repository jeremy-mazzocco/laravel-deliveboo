<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dish;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.section.home-user');
    }
    public function show()
    {
        $userId = Auth::user()->id;
        $dishes = Dish::where('user_id', $userId)->get();
        return view('dashboard.section.dish-show', compact('dishes'));
    }
}
