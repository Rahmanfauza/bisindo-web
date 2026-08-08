<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/translator', [UserController::class, 'translator'])->name('translator');
Route::get('/translator/bisindo', [UserController::class, 'bisindo'])->name('translator.bisindo');
Route::get('/translator/bisindo-kata', [UserController::class, 'bisindoKata'])->name('translator.bisindo_kata');
Route::get('/translator/sibi', [UserController::class, 'sibi'])->name('translator.sibi');
Route::get('/translator/tts', [UserController::class, 'tts'])->name('translator.tts');