<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registeration;

class DashboardController extends Controller
{
    public function index()
    {
        $active_users = Registeration::where('status','active')->count();
        $inactive_users = Registeration::where('status','inactive')->count();
        $cancelled_users = Registeration::where('status','cancelled')->count();
        return view('dashboard', compact('active_users', 'inactive_users', 'cancelled_users'));
    }
}
