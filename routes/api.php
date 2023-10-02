<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::resource('/proveedores', ProveedorController::class)->except(['create', 'edit']);
Route::resource('/empresas', EmpresaController::class)->except(['create', 'edit']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('/users', UserController::class)->except(['create', 'edit']);
});
