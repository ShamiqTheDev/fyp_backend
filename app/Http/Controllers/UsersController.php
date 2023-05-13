<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Package;
use App\Models\UserDetails;
use App\Models\Registeration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('email', '!=', 'admin@gmail.com')->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( User $user)
    {
        $action_url = route('users.store');
        // $packages = Package::all();
        $users = User::where('email', '!=', 'admin@gmail.com')->paginate(10);

        return view('users.register', compact('action_url', 'users') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        // dd($request->all());
        $validation = Validator::make( $request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'type' => 'required',
            'password' => 'required',
        ]);

        if($validation->fails()) {
            return redirect()->back()->with('failure', 'All fields are required!');
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->type = $request->type;
        $user->password = bcrypt($request->password);

        $saved = $user->save();

        // if ( isset($user->id) ) {
        //     $user_detials = new UserDetails;
        //     $user_detials->user_id = $user->id;
        //     $user_detials->phone_number = $request->phone_number;
        //     $user_detials->address = $request->address;
        //     $user_detials->profession = $request->profession;
        //     $saved_details = $user_detials->save();

        //     $registeration = new Registeration;
        //     $registeration->user_id = $user->id;
        //     $registeration->package_id = $request->package_id;
        //     $registeration->status = $request->status;
        //     $registeration->note = $request->note;
        //     $registered = $registeration->save();
        // }

        if ( $saved ) {
            return redirect()->back()->with('success', 'User registered');
        } else {
            return redirect()->back()->with('failure', 'User registeration failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $user_id, Request $request )
    {
        $user = User::where('id', $user_id);

        // if ( $request->has('year') ) {
        //     $user->with(['fees' => function($query) use ($request) {
        //         $query->whereYear('created_at', $request->year );
        //     }]);
        // }

        $user = $user->first();

        return view('users.view', compact('user') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $action_url = route('users.update', $user->id);
        $packages = Package::all();
        $users = User::where('email', '!=', 'admin@gmail.com')->paginate(10);

        return view('users.register', compact('packages', 'action_url', 'users', 'user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->nic_number = $request->nic_number;

        $saved = $user->save();
        $user_detials = UserDetails::where('user_id', $user->id)->first();
        if ( !$user_detials ) {
            $user_detials = new UserDetails;
            $user_detials->user_id = $user->id;
        }
        $user_detials->phone_number = $request->phone_number;
        $user_detials->address = $request->address;
        $user_detials->profession = $request->profession;
        $saved_details = $user_detials->save();

        $registeration = Registeration::where('user_id', $user->id)->first();
        if ( !$registeration ) {
            $registeration = new Registeration;
            $registeration->user_id = $user->id;
        }
        $registeration->user_id = $user->id;
        $registeration->package_id = $request->package_id;
        $registeration->status = $request->status;
        $registeration->note = $request->note;
        $registered = $registeration->save();

        if (isset($registered) && $registered) {
            return redirect()->back()->with('success', 'User registeration updated');
        } else {
            return redirect()->back()->with('failure', 'User registeration failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Delete operation success');
        } else {
            return redirect()->back()->with('failure', 'Delete operation failure');
        }
    }
}
