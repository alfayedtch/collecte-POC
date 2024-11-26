<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'store']);
Route::put('/form', [FormController::class, 'update']);

// Route protected by logging
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/mes', [AuthController::class, 'me']);
});
