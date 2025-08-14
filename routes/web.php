<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Sertifikat;
use App\Models\Service;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PHPUnit\Architecture\Services\ServiceContainer;

Route::get('/', function () {
    $user = User::first();
    $service = Service::all();
    $skill = Skill::all();
    $projek = Project::all();
    $blog = Blog::latest()->limit(3)->get();
    $certificates = Sertifikat::all();
    return view('welcome', compact('user', 'service', 'skill', 'projek', 'blog', 'certificates'));
});
Route::get('/projekdetail/{id}', [ProjectController::class, 'detailproject'])->name('detailproject');

Route::get('/dashboard', function () {
    $user = User::first();
    $service = Service::count();
    $skill = Skill::count();
    $projek = Project::count();
    $blog = Blog::count();
    return view('dashboard', compact('user', 'service', 'skill', 'projek', 'blog'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // profil route
    Route::get('/profile', [ProfilController::class, 'index'])->name('profile.index');
    Route::post('/profile/{id}', [ProfilController::class, 'update'])->name('profile.update');

    // service route
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::delete('/service/{id}', [ServiceController::class, 'hapus'])->name('service.hapus');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');

    // skilld route
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{id}/edit', [SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');

    // sertifikat route
    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
    Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('sertifikat.store');
    Route::delete('/sertifikat/{id}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');
    Route::get('/sertifikat/{id}/edit', [SertifikatController::class, 'edit'])->name('sertifikat.edit');
    Route::put('/sertifikat/{id}', [SertifikatController::class, 'update'])->name('sertifikat.update');


    // projek route
    Route::post('/ckeditor/upload', [ProjectController::class, 'upload'])->name('ckeditor.upload');
    Route::resource('projects', ProjectController::class);

    //blog
    Route::post('/ckeditor/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');
    Route::resource('blogs', BlogController::class);
    Route::post('/blogs/{id}/komentar', [BlogController::class, 'komentar'])->name('blogs.komentar');
    Route::post('/blogs/{id}/like', [BlogController::class, 'like'])->name('blogs.like');
});

require __DIR__ . '/auth.php';
