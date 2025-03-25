<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\volunteer\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
route::get('/home', function () { 
    return view('home');
})->name('home');

Route::get('/register/{role}', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register/volunteer', [AuthController::class, 'registerVolunteer'])->name('register.volunteer');
Route::post('/register/organization', [AuthController::class, 'registerOrganization'])->name('register.organization');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// google authentification
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// profile volunteer
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');