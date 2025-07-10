<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = User::first();
    $service = Service::all();
    return view('welcome', compact('user', 'service'));
});

Route::get('/dashboard', function () {
    $user = User::first();
    return view('dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // profil
    Route::get('/profile', [ProfilController::class, 'index'])->name('profile.index');
    Route::post('/profile/{id}', [ProfilController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
