<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Support\Facades\Route;

//// Public
//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
//
//// Protected
//Route::middleware('auth:sanctum')->group(function () {
//    Route::post('/logout', [AuthController::class, 'logout']);
//});


Route::apiResource('expenses', ExpenseController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
