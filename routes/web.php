<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public home page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (only for logged-in and verified users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (only for logged-in users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (role: admin only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // User management
    Route::resource('users', UserController::class)->except(['show', 'create', 'store']);
    Route::post('users/{id}/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    // Role management
    Route::resource('roles', RoleController::class);
});

// Example CRUD (Posts)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('posts', PostController::class);
});

// Auth routes (from Breeze)
require __DIR__.'/auth.php';
