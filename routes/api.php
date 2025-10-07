<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('users', \App\Presentation\Http\Controllers\UserController::class);
Route::get('users/{id}/accounts', [\App\Presentation\Http\Controllers\UserController::class, 'listAccounts']);

Route::apiResource('accounts', \App\Presentation\Http\Controllers\AccountController::class);
