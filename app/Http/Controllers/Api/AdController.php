<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Ad::all());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
            'square' => 'required|numeric|min:1',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'status_id' => 'required|exists:statuses,id',
            'gender' => 'required|in:male,female',
        ]);

        $ad = Ad::query()->create([
            'title' => $request['title'],
            'address' => $request['address'],
            'price' => $request['price'],
            'rooms' => $request['rooms'],
            'square' => $request['square'],
            'description' => $request['description'],
            'user_id' => $request['user_id'],
            'branch_id' => $request['branch_id'],
            'status_id' => $request['status_id'],
            'gender' => $request['gender'],
        ]);

        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'user' => $ad
        ], 201);
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $ad = Ad::query()->findOrFail($id);
        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'user' => $ad
        ]);
    }


    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
            'square' => 'required|numeric|min:1',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'status_id' => 'required|exists:statuses,id',
            'gender' => 'required|in:male,female',
        ]);

        $ad = Ad::query()->findOrFail($id);
        $ad->update([
            'title' => $request['title'],
            'address' => $request['address'],
            'price' => $request['price'],
            'rooms' => $request['rooms'],
            'square' => $request['square'],
            'description' => $request['description'],
            'user_id' => $request['user_id'],
            'branch_id' => $request['branch_id'],
            'status_id' => $request['status_id'],
            'gender' => $request['gender'],
        ]);

        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'user' => $ad
        ]);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $ad = Ad::query()->findOrFail($id);
        $ad->delete();
        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'user' => $ad
        ], 204);
    }
}
