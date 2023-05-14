<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartsController extends Controller
{

    public function create(Request $request)
    {
        try {

            $validation = Validator::make( $request->all(), [
                'name' => 'required|min:3|max:32',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $part = new Part;
            $part->name = $request->name;
            if ($request->has('user_id') ) {
                $part->user_id = $request->user_id;
            }
            $part->name = $request->name;
            $part->description = $request->description;
            $part->save();

            return response()->json([
                'status' => true,
                'message' => 'Created',
                'data' => $part->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function update(Part $part, Request $request)
    {
        try {
            $validation = Validator::make( $request->all(), [
                'name' => 'required|min:3|max:32',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validation->errors(),
                ], 401);
            }

            $part->name = $request->name;
            $part->description = $request->description;
            $part->update();

            return response()->json([
                'status' => true,
                'message' => 'Updated',
                'data' => $part->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function get(Part $part)
    {
        try {
            return response()->json([
                'status' => true,
                'message' => 'Part',
                'data' => $part->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy(Part $part)
    {
        try {
            $part->delete();
            return response()->json([
                'status' => true,
                'message' => "Deleted Id: {$part->id}",
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
            $parts = Part::all();

            return response()->json([
                'status' => true,
                'message' => 'All parts',
                'data' => $parts,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}
