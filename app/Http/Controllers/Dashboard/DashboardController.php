<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Type;
use Illuminate\Http\Request;

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
}
