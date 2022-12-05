<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/pacientes', [PacientesController::class, 'index']);
Route::get('/pacientes/{id}', [PacientesController::class, 'show']);
Route::post('/pacientes', [PacientesController::class, 'store']);
Route::put('/pacientes/{id}', [PacientesController::class, 'update']);
Route::delete('/pacientes/{id}', [PacientesController::class, 'destroy']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'show']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/token', function () {
    echo csrf_token();
});

Route::get('/hashed/{password}', function ($password) {
    echo Hash::make($password);
});