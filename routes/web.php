<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Authentication routes (hanya untuk guest/tidak login)
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Hanya POST login
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/onboarding', [UserController::class, 'onboarding'])->name('onboarding');
    Route::post('/onboarding/complete', [UserController::class, 'completeOnboarding'])->name('onboarding.complete');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');
    Route::get('/translator', [UserController::class, 'translator'])->name('translator');
    Route::get('/translator/bisindo', [UserController::class, 'bisindo'])->name('translator.bisindo');
    Route::get('/translator/sibi', [UserController::class, 'sibi'])->name('translator.sibi');
    Route::get('/translator/tts', [UserController::class, 'tts'])->name('translator.tts');
    Route::get('/dictionary', [UserController::class, 'dictionary'])->name('dictionary');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});