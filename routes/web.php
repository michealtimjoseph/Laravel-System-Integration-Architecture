<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ✅ Welcome page
Route::get('/', function () {
    return view('welcome');
});

// ✅ Dashboard (protected)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth routes (login, register, logout, etc.)
require __DIR__.'/auth.php';