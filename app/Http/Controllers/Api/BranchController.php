<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Branch::all());
    }


    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->create([
            'name' => $request['name'],
            'address' => $request['address'],
        ]);

        return response()->json([
            'message' => 'Branch created successfully',
            'status' => 'success',
            'branch' => $branch,
        ]);
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);
        return response()->json([
            'message' => 'Branch retrieved successfully',
            'status' => 'success',
            'branch' => $branch,
        ]);
    }

    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);
        $branch->update([
            'name' => $request['name'],
            'address' => $request['address'],
        ]);

        return response()->json([
            'message' => 'Branch updated successfully',
            'status' => 'success',
            'branch' => $branch,
        ]);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);
        $branch->delete();
        return response()->json([
            'message' => 'Branch deleted successfully',
            'status' => 'success',
            'branch' => $branch,
        ]);
    }
}
