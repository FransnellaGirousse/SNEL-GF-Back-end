<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\Auth\GoogleController;



Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

{/*PurchaseRequest*/}
Route::get('/purchase-requests', [PurchaseRequestController::class, 'index']); 
Route::post('/purchase-requests', [PurchaseRequestController::class, 'store']); 
Route::get('/purchase-requests/{id}', [PurchaseRequestController::class, 'show']); 
Route::put('/purchase-requests/{id}', [PurchaseRequestController::class, 'update']); 
Route::delete('/purchase-requests/{id}', [PurchaseRequestController::class, 'destroy']); 

{/*MisiionsTdr*/}
Route::get('/missions', [MissionController::class, 'index']); 
Route::post('/missions', [MissionController::class, 'store']); 
Route::get('/missions/{id}', [MissionController::class, 'show']); 
Route::put('/missions/{id}', [MissionController::class, 'update']); 
Route::delete('/missions/{id}', [MissionController::class, 'destroy']); 



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
