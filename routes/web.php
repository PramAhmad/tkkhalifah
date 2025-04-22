<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// category
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('front.category');

Route::get('/activity/{activity}', [ActivityController::class, 'show'])->name('activity.show');
// contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

// Add to web.php routes file
Route::get('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftaran.store');