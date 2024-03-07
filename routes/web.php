<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\UserDashboardContoller;
use App\Http\Controllers\Frontend\UserProfileContoller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/login', [\App\Http\Controllers\Backend\AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function (){
    Route::get('dashboard',[UserDashboardContoller::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileContoller::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileContoller::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileContoller::class, 'updatePassword'])->name('profile.update.password');
});
