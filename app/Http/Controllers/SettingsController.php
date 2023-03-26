<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('settings.index', compact('packages') );
    }


}
