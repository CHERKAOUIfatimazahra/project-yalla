<?php


use App\Http\Controllers\Auth\AuthController;
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

// Home page
Route::view('/', 'home');

// find event pages
Route::view('/find-event', 'find-event');

// Contact page
Route::view('/contact', 'contact');

// dashbord
Route::view('/statistique', 'dashbord.statistique');

// single pages
Route::view('/business', 'page-categories.business');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::get('/register', [AuthController::class, 'create'])->name('register.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'store'])->name('register');

    // Password reset routes
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});