<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// page to get user
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{order}', [UserController::class, 'order']);