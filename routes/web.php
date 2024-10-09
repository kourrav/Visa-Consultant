<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\EligibilityController;

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('dashboard');


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // User routes
    Route::get('users', [UserController::class, 'index'])->name('admin.users'); // List users
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create'); // Show create user form
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store'); // Store new user
    Route::get('users/{user}', [UserController::class, 'show'])->name('admin.users.show'); // Show user details
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit'); // Show edit user form
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update'); // Update user
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy'); // Delete user
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications');
});

Route::get('password/change', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('password/update', [ChangePasswordController::class, 'updatePassword'])->name('password.update');
// web.php
Route::get('profile/settings', [HomeController::class, 'profileSetting'])->name('profile.settings');
Route::post('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');
Route::get('profile/change-password', [HomeController::class, 'changePassword'])->name('profile.changePassword');
Route::post('/profile/update-password', [HomeController::class, 'updatePassword'])->name('profile.updatePassword');


Route::post('/eligibility-submit', [EligibilityController::class, 'submitForm'])->name('eligibility.submit');



