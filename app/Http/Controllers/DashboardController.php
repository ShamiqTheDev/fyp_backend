<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Registeration;

class DashboardController extends Controller
{
    public function index()
    {
        $active_users = User::where('type','!=','admin')->count();
        return view('dashboard', compact('active_users'));
    }
}
