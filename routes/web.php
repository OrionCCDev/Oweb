<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainHomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SectorController as AdminSectorController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\HomeFeatureController as AdminHomeFeatureController;
use App\Http\Controllers\Admin\GalleryImageController as AdminGalleryImageController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContentSettingController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\Admin\ContactSubmissionController as AdminContactSubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainHomePageController::class , 'index'])->name('home');
Route::get('/home-modeled', [MainHomePageController::class , 'modeled'])->name('home.modeled');
Route::resource('projects' , ProjectController::class);
Route::resource('certificate' , CertificateController::class );
Route::resource('sectors' , SectorController::class);
Route::resource('news' , EventController::class);
Route::get('/projects-list', [ProjectController::class , 'indexOfList'])->name('indexOfList');
Route::get('/contact', function(){
    return view('orionccFront.contact-us');
})->name('contact');
Route::post('/contact', [ContactSubmissionController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.submit');

// Route::get('/our-projects', function () {
//     return view('orionccFront.projects');
// })->name('projects');

// Route::get('/our-sectors', function () {
//     return view('orionccFront.sectors');
// })->name('sectors');

Route::get('/our-clients', [ClientController::class, 'index'])->name('clients');

Route::get('/about-us', function () {
    return view('orionccFront.about');
})->name('about');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::middleware(['auth', 'verified'])->group(function () {
    // Main Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->middleware('can:manage-projects')->group(function () {
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

        // Certificates Management
        Route::resource('certificates', AdminCertificateController::class);

        // Homepage Features Management
        Route::resource('home-features', AdminHomeFeatureController::class);

        // Homepage Gallery Management
        Route::resource('gallery-images', AdminGalleryImageController::class);

        // Contact Form Submissions
        Route::resource('contact-submissions', AdminContactSubmissionController::class)
            ->only(['index', 'show', 'destroy']);

        // Settings Management
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/homepage', [SettingController::class, 'homepageOverview'])->name('settings.homepage');
        Route::get('settings/hero', [SettingController::class, 'hero'])->name('settings.hero');
        Route::post('settings/hero', [SettingController::class, 'updateHero'])->name('settings.hero.update');
        Route::get('settings/stats-bar', [SettingController::class, 'statsBar'])->name('settings.stats-bar');
        Route::post('settings/stats-bar', [SettingController::class, 'updateStatsBar'])->name('settings.stats-bar.update');
        Route::get('settings/projects-section', [SettingController::class, 'projectsSection'])->name('settings.projects-section');
        Route::post('settings/projects-section', [SettingController::class, 'updateProjectsSection'])->name('settings.projects-section.update');
        Route::get('settings/about-section', [SettingController::class, 'aboutSection'])->name('settings.about-section');
        Route::post('settings/about-section', [SettingController::class, 'updateAboutSection'])->name('settings.about-section.update');
        Route::get('settings/cta-banner', [SettingController::class, 'ctaBanner'])->name('settings.cta-banner');
        Route::post('settings/cta-banner', [SettingController::class, 'updateCtaBanner'])->name('settings.cta-banner.update');
        Route::get('settings/about', [SettingController::class, 'about'])->name('settings.about');
        Route::post('settings/about', [SettingController::class, 'updateAbout'])->name('settings.about.update');
        Route::get('settings/contact', [SettingController::class, 'contact'])->name('settings.contact');
        Route::post('settings/contact', [SettingController::class, 'updateContact'])->name('settings.contact.update');
        Route::get('settings/create', [SettingController::class, 'create'])->name('settings.create');
        Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
        Route::get('settings/{setting}/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::patch('settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
        Route::delete('settings/{setting}', [SettingController::class, 'destroy'])->name('settings.destroy');

        // Admin User Management (super admins only)
        Route::resource('admin-users', AdminUserController::class)
            ->middleware('can:manage-admins');

        // Generic, config-driven content sections (config/site_content.php)
        Route::get('content', [ContentSettingController::class, 'index'])->name('content.index');
        Route::get('content/{group}', [ContentSettingController::class, 'edit'])->name('content.edit');
        Route::post('content/{group}', [ContentSettingController::class, 'update'])->name('content.update');
    });
});

require __DIR__.'/auth.php';

Route::get('/qrcode', [App\Http\Controllers\QRCodeController::class, 'index'])->name('qrcode');
