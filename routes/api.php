<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::post('/register',[AuthenticationController::class,'register']);
    Route::post('/login',[AuthenticationController::class,'login']);
});
Route::middleware('auth:sanctum')->group(function(){
    Route::get('spot/{spot}/reviews',[ReviewController::class,'reviews']);
    Route::post('logout',[AuthenticationController::class,'logout']);
    Route::apiresource('spot',SpotController::class);
    Route::apiResource('review', ReviewController::class)->only([
        'store',
        'destroy'
    ])->middleware(['store'], 'ensureUserHasRole:USER')
    ->middleware(['destroy'], 'ensureUserHasRole:ADMIN');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
