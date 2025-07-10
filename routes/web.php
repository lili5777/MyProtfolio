<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PHPUnit\Architecture\Services\ServiceContainer;

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

    // profil
    Route::get('/profile', [ProfilController::class, 'index'])->name('profile.index');
    Route::post('/profile/{id}', [ProfilController::class, 'update'])->name('profile.update');

    // service
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::delete('/service/{id}', [ServiceController::class, 'hapus'])->name('service.hapus');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
});

require __DIR__ . '/auth.php';
