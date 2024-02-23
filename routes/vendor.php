<?php

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

/** Vendor Routes */

Route::get('dashboard', [\App\Http\Controllers\Backend\VendorController::class, 'dashboard'])
->name('dashboard');
