<?php

namespace App\Http\Controllers;

use App\Models\VehicleRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleRegistrationController extends Controller
{


    public function create(Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'user_id' => 'required',
                'name' => 'required',
                'number' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $vehicleRegistration = new VehicleRegistration;

            $vehicleRegistration->user_id = $request->user_id;
            $vehicleRegistration->name = $request->name;
            $vehicleRegistration->number = $request->number;

            $vehicleRegistration->save();

            return response()->json([
                'status' => true,
                'message' => 'Created',
                'data' => $vehicleRegistration->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function update(VehicleRegistration $vehicleRegistration, Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'user_id' => 'required',
                'name' => 'required',
                'number' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $vehicleRegistration->user_id = $request->user_id;
            $vehicleRegistration->name = $request->name;
            $vehicleRegistration->number = $request->number;

            $vehicleRegistration->update();

            return response()->json([
                'status' => true,
                'message' => 'Updated',
                'data' => $vehicleRegistration->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function get(VehicleRegistration $vehicleRegistration)
    {
        try {
            return response()->json([
                'status' => true,
                'message' => 'Fetched!',
                'data' => $vehicleRegistration->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy(VehicleRegistration $vehicleRegistration)
    {
        try {
            $vehicleRegistration->delete();
            return response()->json([
                'status' => true,
                'message' => "Deleted Id: {$vehicleRegistration->id}",
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getAll()
    {
        try {
            $vehicleRegistration = VehicleRegistration::all();

            return response()->json([
                'status' => true,
                'message' => 'All vehicle regsterations',
                'data' => $vehicleRegistration,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}