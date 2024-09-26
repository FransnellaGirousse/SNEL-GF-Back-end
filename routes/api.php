<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MissionReportController;
use App\Http\Controllers\RequestInAdvanceController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\Auth\RegisterController;  

Route::post('/register', [RegisterController::class, 'register']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

{/*RequestInAdvance*/}

Route::get('/request-in-advance', [RequestInAdvanceController::class, 'index']);
Route::post('/request-in-advance', [RequestInAdvanceController::class, 'store']);
Route::get('/request-in-advance/{id}', [RequestInAdvanceController::class, 'show']);
Route::put('/request-in-advance/{id}', [RequestInAdvanceController::class, 'update']);
Route::delete('/request-in-advance/{id}', [RequestInAdvanceController::class, 'destroy']);


{/*MissionReports*/}
Route::get('/mission-reports', [MissionReportController::class, 'index']); 
Route::post('/mission-reports', [MissionReportController::class, 'store']); 
Route::get('/mission-reports/{id}', [MissionReportController::class, 'show']); 
Route::put('/mission-reports/{id}', [MissionReportController::class, 'update']); 
Route::delete('/mission-reports/{id}', [MissionReportController::class, 'destroy']); 


{/*PurchaseRequest*/}

Route::get('purchase-requests', [PurchaseRequestController::class, 'index']); // Obtenir toutes les demandes d'achat
Route::post('purchase-requests', [PurchaseRequestController::class, 'store']); // Créer une nouvelle demande d'achat
Route::get('purchase-requests/{id}', [PurchaseRequestController::class, 'show']); // Obtenir une demande d'achat spécifique
Route::put('purchase-requests/{id}', [PurchaseRequestController::class, 'update']); // Mettre à jour une demande d'achat
Route::delete('purchase-requests/{id}', [PurchaseRequestController::class, 'destroy']); // Supprimer une demande d'achat


{/*MisiionsTdr*/}
Route::get('/missions', [MissionController::class, 'index']); 
Route::post('/missions', [MissionController::class, 'store']); 
Route::get('/missions/{id}', [MissionController::class, 'show']); 
Route::put('/missions/{id}', [MissionController::class, 'update']); 
Route::delete('/missions/{id}', [MissionController::class, 'destroy']); 



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
