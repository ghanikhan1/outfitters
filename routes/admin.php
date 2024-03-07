<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

/** Admin Routes */

Route::get('dashboard', [\App\Http\Controllers\Backend\AdminController::class, 'dashboard'])
    ->name('dashboard');

/** Profile Route */

Route::get('profile', [\App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [\App\Http\Controllers\Backend\ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [\App\Http\Controllers\Backend\ProfileController::class, 'updatePassword'])->name('password.update');

// Slider Routes
Route::resource('slider', SliderController::class);
