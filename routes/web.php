<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\organization\OpporunityController;
use App\Http\Controllers\organization\OrganizationProfileController;
use App\Http\Controllers\volunteer\ApplyOpportuniyController;
use App\Http\Controllers\volunteer\ProfileController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function() {
    return view('about');
});
Route::get('/contact', function() {
    return view('contact');
});
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home')->with('status', 'Your email has been verified!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// routes accessible for every one 
Route::get('/home', [OpporunityController::class, 'list'])->name('home');
Route::get('/opportunities/{id}',[OpporunityController::class, 'show'])->name('opportunities.show');
Route::get('/donations', [DonationController::class, 'index'])->name('donation.index');
Route::get('/donations/{id}', [DonationController::class, 'show'])->name('donation.show');

Route::get('/organization/{id}', [OrganizationProfileController::class, 'show'])->name('organization.show');
Route::get('/user/{id}/profile', [ProfileController::class, 'show'])->name('user.profile');

Route::get('/register/{role}', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register/volunteer', [AuthController::class, 'registerVolunteer'])->name('register.volunteer');
Route::post('/register/organization', [AuthController::class, 'registerOrganization'])->name('register.organization');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/opportunity', [OpporunityController::class, 'index'])->name('opportunity.index');
    Route::get('/opportunity/add', [OpporunityController::class, 'create'])->name('opportunity.create');
    Route::get('/opportunities',[OpporunityController::class, 'list'])->name('opportunities.list');
    Route::get('/donation/my', [DonationController::class, 'list'])->name('donation.list');
    Route::get('/donation/create', [DonationController::class, 'create'])->name('donation.create');
    Route::get('/donation/edit/{id}', [DonationController::class, 'edit'])->name('donation.edit');
    Route::post('/donations', [DonationController::class, 'store'])->name('donation.store');
    Route::put('/donations/{id}', [DonationController::class, 'update'])->name('donation.update');
    Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donation.destroy');
    // messages 

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index'); 
    Route::get('/messages/{conversation}', [MessageController::class, 'show'])->name('messages.show'); 
    Route::post('/messages/{conversation}', [MessageController::class, 'send'])->name('messages.send'); 
    Route::post('/conversations', [MessageController::class, 'createConversation'])->name('conversations.create');
    // apply donation 
    Route::post('/donations/{id}/apply', [DonationController::class, 'apply'])->name('donations.apply');
    
});

Route::middleware(['auth','verified','role:volunteer'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    // apply opportunity
    Route::post('/opportunities/{id}/apply', [ApplyOpportuniyController::class, 'apply'])->name('opportunity.apply');
    Route::get('/opportunity/applications', [ApplyOpportuniyController::class, 'list'])->name('opportunity.application');
    
});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // users
    Route::get('/utilisateurs', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::delete('/utilisateurs/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    // donations
    Route::get('/dons', [AdminController::class, 'listDonation'])->name('admin.donations');
    Route::delete('/admin/donations/{id}', [AdminController::class, 'deleteDonation'])->name('admin.donations.delete');
    // opportunitées
    Route::get('/opportunités', [AdminController::class, 'listOpportunities'])->name('admin.opportunities');
    Route::delete('/admin/opportunities/{id}', [AdminController::class, 'deleteOpportunity'])->name('admin.opportunities.delete');
    // categories
    Route::get('/categories', [AdminController::class, 'listCategories'])->name('admin.categories');
    Route::post('/admin/add/category', [AdminController::class, 'addCategory'])->name('admin.add.category');
    Route::put('/admin/update/category/{id}', [AdminController::class , 'updateCategory'])->name('admin.update.category');
    Route::delete('/admin/category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.delete.category');
    // location
    Route::get('/locations', [AdminController::class, 'listLocations'])->name('admin.locations');
    Route::post('/admin/add/location', [AdminController::class,'addLocation'])->name('admin.add.location');
    Route::put('/admin/update/location/{id}', [AdminController::class, 'updateLocation'])->name('admin.update.location');
    Route::delete('/admin/location/{id}', [AdminController::class, 'deleteLocation'])->name('admin.delete.location');

});


Route::middleware(['auth','role:organization'])->group(function () {
    Route::get('/organization', [OrganizationProfileController::class, 'index'])->name('organization.index');
    Route::post('/organization', [OrganizationProfileController::class, 'store'])->name('organization.store');
    Route::post('/opportunity', [OpporunityController::class, 'store'])->name('opportunity.store');
    Route::delete('/opportunities/{id}',[OpporunityController::class, 'destroy'])->name('opportunities.destroy');
    Route::get('/opportunity/edit/{id}', [OpporunityController::class, 'edit'])->name('opportunity.edit');
    Route::put('/opportunity/update/{id}',[OpporunityController::class, 'update'])->name('opportunity.update');
    Route::get('/opportunities/{id}/applications',[OpporunityController::class ,'applications'])->name('opportunity.applications');
    // application management
    Route::get('/opportunity/management/{id}',[OpporunityController::class, 'manage'])->name('opportunity.manage');
    Route::put('/opportunity/management/{id}',[OpporunityController::class, 'management'])->name('opportunity.management');
    
});










