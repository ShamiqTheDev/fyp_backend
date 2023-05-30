<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                // 'gender' => 'required',
                'password' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = strtolower($request->email) ;
            // $user->gender = $request->gender;
            $user->fcm_token = $request->fcm_token;
            // $user->type = 'appuser'; // Using defaults as appuser role
            $user->password = bcrypt($request->password);
            $user->save();


            return response()->json([
                'status' => true,
                'message' => 'User created',
                'data' => $user->toArray(),
                'token' => $user->createToken("API TOKEN")->plainTextToken,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }
            $authenticated = Auth::attempt([
                'email' => strtolower($request->email),
                'password' => $request->password,
            ]);

            if (!$authenticated) {
                return response()->json([
                    'status' => false,
                    'message' => 'Incorrect email or password',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $user = User::with('vehicleRegistrations')->where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Authenticated',
                'data' => $user->toArray(),
                'token' => $user->createToken("API TOKEN")->plainTextToken,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
