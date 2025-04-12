<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// category
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('front.category');

Route::get('/activity/{activity}', [ActivityController::class, 'show'])->name('activity.show');