<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Package;
use App\Models\User;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fee::orderBy('id', 'DESC')->paginate(10);
        return view('fees.index', compact('fees') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $action_url = route('fees.store', $user_id);
        $months = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
        $packages  = Package::all();

        return view('fees.entry', compact('action_url', 'months', 'packages', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $fee = new Fee;
        $fee->user_id = $user->id;
        $packages_amount = Package::where('id', $request->package_id)->pluck('permonth_charges')->first();
        $fee->package_id = $request->package_id;
        $fee->amount = $packages_amount;
        $fee->month = $request->month;
        $fee->note = $request->note;
        $fees_paid = $fee->save();

        if ( isset($fees_paid) && $fees_paid) {
            return redirect()->route('fees')->with('success', 'Create operation success');
        } else {
            return redirect()->back()->with('failure', 'Create operation failed');
        }    
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        $action_url = route('fees.update', $fee->id);
        $months = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
        $packages  = Package::all();

        return view('fees.entry', compact('action_url', 'months', 'packages','fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        $packages_amount = Package::where('id', $request->package_id)->pluck('permonth_charges')->first();
        $fee->package_id = $request->package_id;
        $fee->amount = $packages_amount;
        $fee->month = $request->month;
        $fee->note = $request->note;
        $fees_paid = $fee->save();

        if ( isset($fees_paid) && $fees_paid) {
            return redirect()->back()->with('success', 'Update operation success');
        } else {
            return redirect()->back()->with('failure', 'Update operation failed');
        }    

    }


}
