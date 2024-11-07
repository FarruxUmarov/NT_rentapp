<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Status::all());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->create([
            'status' => $request['status'],
        ]);

        return response()->json([
            'message' => 'Successfully created status!',
            'status' => $status,
        ]);
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->findOrFail($id);
        return response()->json([
            'message' => 'Successfully created status!',
            'status' => $status,
        ]);
    }

    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->findOrFail($id);
        $status->update([
            'status'
        ]);

        return response()->json([
            'message' => 'Successfully updated status!',
            'status' => $status,
        ]);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->findOrFail($id);
        $status->delete();
        return response()->json([
            'message' => 'Successfully deleted status!',
            'status' => $status,
        ]);
    }
}
