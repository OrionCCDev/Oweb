<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainHomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainHomePageController::class , 'index'])->name('home');
Route::resource('projects' , ProjectController::class);
Route::resource('certificate' , CertificateController::class );
Route::resource('sectors' , SectorController::class);
Route::resource('news' , EventController::class);
Route::get('/projects-list', [ProjectController::class , 'indexOfList'])->name('indexOfList');
Route::get('/contact', function(){
    return view('orionccFront.contact');
})->name('contact');


// Route::get('/our-projects', function () {
//     return view('orionccFront.projects');
// })->name('projects');

// Route::get('/our-sectors', function () {
//     return view('orionccFront.sectors');
// })->name('sectors');

Route::get('/our-clients', function () {
    return view('orionccFront.clients');
})->name('clients');

Route::get('/our-team', function () {
    return view('orionccFront.team');
})->name('team');

Route::get('/about-us', function () {
    return view('orionccFront.about');
})->name('about');

// Route::get('/contact-us', function () {
//     return view('orionccFront.contact');
// })->name('contact');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
