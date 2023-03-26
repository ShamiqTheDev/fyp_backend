<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action_url = route('package.store');
        $packages = Package::all();
        return view('packages.create', compact('action_url', 'packages') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Package $package)
    {
        $package->name = $request->name;
        $package->details = $request->details;
        $package->permonth_charges = $request->permonth_charges;
        $package->advance = $request->advance;

        $saved = $package->save();

        if ($saved) {
            return redirect()->back()->with('success', 'Create operation success');
        } else {
            return redirect()->back()->with('failure', 'Create operation failure');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $action_url = route('package.update', $package->id);
        $packages = Package::all();

        return view('packages.create', compact('action_url', 'packages', 'package') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $package->name = $request->name;
        $package->details = $request->details;
        $package->permonth_charges = $request->permonth_charges;
        $package->advance = $request->advance;

        $saved = $package->save();

        if ($saved) {
            return redirect()->back()->with('success', 'Update operation success');
        } else {
            return redirect()->back()->with('failure', 'Update operation failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $deleted = $package->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Delete operation success');
        } else {
            return redirect()->back()->with('failure', 'Delete operation failure');
        }
    }
}
