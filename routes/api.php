<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('users', [UsersController::class, 'showAll']);
Route::get('users/{id}', [UsersController::class, 'show']);
Route::get('items', [ItemsController::class, 'showAll']);
Route::post('purchase', [ItemsController::class, 'purchase']);
