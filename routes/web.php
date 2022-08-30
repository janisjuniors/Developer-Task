<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/', [UsersController::class, 'index']);
Route::get('user/{id}', [UsersController::class, 'details']);
