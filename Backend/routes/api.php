<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;

Route::get('/cep/{cep}', [CepController::class, 'search']);
Route::apiResource('addresses', AddressController::class);

