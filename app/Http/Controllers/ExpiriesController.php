<?php

namespace App\Http\Controllers;

use App\Models\Expiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpiriesController extends Controller
{

    public function create(Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'part_id' => 'required',
                'type' => 'required',
                'notify_before' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $expiry = new Expiry;

            $expiry->part_id = $request->part_id;
            $expiry->type = $request->type;
            $expiry->expiry = $request->expiry;
            $expiry->notify_before = $request->notify_before;
            $expiry->note = $request->note;

            $expiry->save();

            return response()->json([
                'status' => true,
                'message' => 'Created',
                'data' => $expiry->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function update(Expiry $expiry, Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'part_id' => 'required',
                'type' => 'required',
                'notify_before' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $expiry->part_id = $request->part_id;
            $expiry->type = $request->type;
            $expiry->expiry = $request->expiry;
            $expiry->notify_before = $request->notify_before;
            $expiry->note = $request->note;

            $expiry->update();

            return response()->json([
                'status' => true,
                'message' => 'Updated',
                'data' => $expiry->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function get(Expiry $expiry)
    {
        try {
            return response()->json([
                'status' => true,
                'message' => 'Fetched!',
                'data' => $expiry->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy(Expiry $expiry)
    {
        try {
            $expiry->delete();
            return response()->json([
                'status' => true,
                'message' => "Deleted Id: {$expiry->id}",
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
            $expirys = Expiry::all();

            return response()->json([
                'status' => true,
                'message' => 'All parts',
                'data' => $expirys,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}
