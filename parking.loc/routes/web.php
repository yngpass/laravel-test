<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ValidateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// get
Route::get('/', [MainController::class, 'index']);
Route::get('/registration', [MainController::class, 'registration']);
Route::get('/update/{id}', [MainController::class, 'update']);

// post
Route::post('/registration/check', [ValidateController::class, 'regCheck']);
Route::post('/update/check/{id}', [ValidateController::class, 'upCheck']);
Route::post('/add-car', [ValidateController::class, 'addCar']);
Route::post('/delete-car', [ValidateController::class, 'deleteCar']);
Route::post('/delete-client/{id}', [ValidateController::class, 'deleteClient']);
