<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(User::all());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:male,female',
            'position' => 'required|string|max:100',
        ]);


        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'position' => $request['position'],
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->findOrFail($id);
        return response()->json([
            'message' => 'User found',
            'status' => 'success',
            'user' => $user
        ]);
    }

    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:male,female',
            'position' => 'required|string|max:100',
        ]);

        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'position' => $request['position'],
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            '$user' => $user,
        ]);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return response()->json([
            'message' => 'User deleted',
            'status' => 'success',
            'user' => $user
        ], 204);
    }
}
