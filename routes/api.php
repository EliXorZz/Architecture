<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('users', \App\Presentation\Http\Controllers\UserController::class);

Route::apiResource('accounts', \App\Presentation\Http\Controllers\AccountController::class);
Route::get('accounts/user/{id}', [\App\Presentation\Http\Controllers\AccountController::class, 'listAccountsByUser']);
