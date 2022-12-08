<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Web Routes
Route::get('/home', [HomeController::class, 'show']);
Route::post('/orders', [OrdersController::class, 'create']);
Route::get('/', function () {
    return redirect('/login');
});

// Web Routes - Authentication
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

// Api Routes
Route::prefix('api')->group(function () {
    // Api Routes - Centros Médicos
    Route::get('/centrosmedicos', function () {
        $centrosmedicos = [
            [
                "id" => 1,
                "name" => 'CLINICA MOTEVIDEO',
                "address" => "Jr. Montevideo 448, Surco",
                "created_at" => "2022-05-27 12:07:17"
            ],
            [
                "id" => 2,
                "name" => 'CLINICA JAVIER PRADO',
                "address" => "Av. Javier Prado 708, San Isidro",
                "created_at" => "2022-08-27 12:07:17"
            ]
        ];

        return response($centrosmedicos, 200);
    });

    // Api Routes - Pacientes
    Route::get('/pacientes', [PatientsController::class, 'index']);
    Route::get('/pacientes/{id}', [PatientsController::class, 'show']);
    Route::delete('/pacientes/{id}', [PatientsController::class, 'destroy']);
    Route::post('/pacientes', [PatientsController::class, 'store']);
    Route::put('/pacientes/{id}', [PatientsController::class, 'update']);

    // Api Routes - Authentication
    Route::post('/signup', [SignupController::class, 'store']);

    // Api routes - Orders
    Route::get('/orders', [OrdersController::class, 'index']);
    Route::post('/orders', [OrdersController::class, 'store']);

    // Api routes - utilities
    Route::get('/token', function () {
        echo csrf_token();
    });
    Route::get('/hashed/{password}', function ($password) {
        echo Hash::make($password);
    });
});