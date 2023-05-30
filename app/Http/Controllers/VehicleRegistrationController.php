<?php

namespace App\Http\Controllers;

use App\Models\Expiry;
use App\Models\User;
use App\Models\VehicleRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Kutia\Larafirebase\Facades\Larafirebase;


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
                // 'user_id' => 'required',
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

            // $vehicleRegistration->user_id = $request->user_id;
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

    public function updateVehicleGeolocation($vehicle_registration_id, Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'distance' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $vehicleRegistration = VehicleRegistration::with('expiries')->with('parts.expiries')
                ->find($vehicle_registration_id);

            $oldDistance = $vehicleRegistration->distance;
            $newDistance = round($request->distance, 2);
            $partsDistanceIncrement = $newDistance - $oldDistance;
            $vehicleId = $vehicleRegistration->id;
            $userId = $vehicleRegistration->user_id;

            $updVehicleRegistration = VehicleRegistration::find($vehicle_registration_id);
            $updVehicleRegistration->distance = $newDistance;
            $updVehicleRegistration->latitude = round($request->latitude, 8);
            $updVehicleRegistration->longitude = round($request->longitude, 8);
            $updVehicleRegistration->update();

            $parts = $vehicleRegistration->parts;

            foreach ($parts as $part) {
                $expiry = $part->expiry;
                $eDistance = $expiry->distance + $partsDistanceIncrement;
                $expiryData['distance'] = $eDistance;
                $expiryId = $expiry->id;

                Expiry::where('id', $expiry->id)->update($expiryData);

                $user = User::where('id', $userId)->first();

                // Sending Upcoming Expiry notification!
                if($eDistance >= $expiry->notify_at){
                    $title = 'Upcoming Expiry: ' . $part->name;

                    $body = 'Your Vehicle: '.$part->vehicleRegistration->name;
                    $body .= ' Part: '.$part->name.' is about to expire';
                    $body .= ' Ran: '.$eDistance.' KMs';

                    $this->sendNotification($title, $body, $user->fcm_token);

                    Log::channel('apis')->info("Notification sent for expiryId: {$expiryId}");
                    Log::channel('apis')->info("Title: {$title}");
                    Log::channel('apis')->info("Body: {$body}");

                } // END: Sending Upcoming Expiry notification!

                // Sending Part Expired Notification!
                if($eDistance >= $expiry->expiry) {
                    $title = 'Expired: ' . $part->name;

                    $body = 'Your Vehicle: '.$part->vehicleRegistration->name;
                    $body .= ' Part: '.$part->name.' is about to expire';
                    $body .= ' Ran: '.$eDistance.' KMs';
                    $this->sendNotification($title, $body, $user->fcm_token);

                    Log::channel('apis')->info("Notification sent for expiryId: {$expiryId}");
                    Log::channel('apis')->info("Title: {$title}");
                    Log::channel('apis')->info("Body: {$body}");

                } // END: Sending Part Expired Notification!
            }

            return response()->json([
                'status' => true,
                'message' => 'Updated',
                // 'data' => $vehicleRegistration->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            Log::channel('apis')->error($th);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function sendNotification($title, $body, $fcm_tokens)
    {
        try {
            return Larafirebase::fromArray(['title' => $title, 'body' => $body])
                        ->sendNotification($fcm_tokens);

        } catch (\Throwable $th) {
            // throw $th;
            Log::channel('apis')->info($th);
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

    public function getAllByUserId($user_id)
    {
        try {
            $vehicleRegistration = VehicleRegistration::where('user_id', $user_id)->get();

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

}
