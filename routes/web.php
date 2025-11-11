<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainHomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SectorController as AdminSectorController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\SettingController;
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

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Route::get('/contact-us', function () {
//     return view('orionccFront.contact');
// })->name('contact');
Route::middleware(['auth', 'verified'])->group(function () {
    // Main Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Projects Management
        Route::resource('projects', AdminProjectController::class);
        Route::delete('projects/image/delete', [AdminProjectController::class, 'deleteImage'])->name('projects.deleteImage');
        Route::delete('projects/gallery/{id}', [AdminProjectController::class, 'deleteGalleryImage'])->name('projects.deleteGalleryImage');

        // Sectors Management
        Route::resource('sectors', AdminSectorController::class);

        // Events/News Management
        Route::resource('events', AdminEventController::class);

        // Clients Management
        Route::resource('clients', AdminClientController::class);

        // Settings Management
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/homepage', [SettingController::class, 'homepage'])->name('settings.homepage');
        Route::post('settings/homepage', [SettingController::class, 'updateHomepage'])->name('settings.homepage.update');
        Route::get('settings/contact', [SettingController::class, 'contact'])->name('settings.contact');
        Route::post('settings/contact', [SettingController::class, 'updateContact'])->name('settings.contact.update');
        Route::get('settings/create', [SettingController::class, 'create'])->name('settings.create');
        Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
        Route::get('settings/{setting}/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::patch('settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
        Route::delete('settings/{setting}', [SettingController::class, 'destroy'])->name('settings.destroy');
    });
});

require __DIR__.'/auth.php';

Route::get('/qrcode', [App\Http\Controllers\QRCodeController::class, 'index'])->name('qrcode');
