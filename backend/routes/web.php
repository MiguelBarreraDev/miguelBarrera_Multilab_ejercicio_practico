<?php

use Illuminate\Support\Facades\Route;

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