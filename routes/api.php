<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::resource('/proveedores', ProveedorController::class)->except(['create', 'edit']);
