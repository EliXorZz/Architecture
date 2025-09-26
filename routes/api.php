<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('users', \App\Presentation\Http\Controllers\UserController::class);
