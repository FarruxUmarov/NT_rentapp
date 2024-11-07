<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UserController;
use App\Models\Branch;
use App\Models\Status;
use App\Models\User;
use App\View\Components\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

//Route::post('/tokens/create', function (Request $request) {
//
//    $user = User::query()->create([
//        'name'     => $request->name,
//        'phone'    => $request->phone,
//        'password' => Hash::make($request->password)
//    ]);
//
//    $token = $user->createToken('user')->plainTextToken;
//
//    return ['token' => $token];
//});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::resource('/users', UserController::class)->middleware('auth:sanctum');
Route::resource('/branches', BranchController::class)->middleware('auth:sanctum');
Route::resource('/ads', AdController::class)->middleware('auth:sanctum');
Route::resource('/statuses', StatusController::class)->middleware('auth:sanctum');
