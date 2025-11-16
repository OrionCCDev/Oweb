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
<div class="hot-products-two__bottom">
                <div class="row filter-layout">
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Streit_FACTORY/main.webp" alt="Streit Group Armored Vehicle Factory" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Streit_FACTORY/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/8">Streit Group Armored Vehicle Factory</a>
                                        </h3>
                                        <p class="hot-products__price">Industrial Complex</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/8" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Rakez_Accommodation_Community/main.webp" alt="RAKEZ Accommodation Community" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Rakez_Accommodation_Community/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/23">RAKEZ Accommodation Community</a>
                                        </h3>
                                        <p class="hot-products__price">Residential Buildings</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/23" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Healthcare_Center-RAK/main.webp" alt="Healthcare Center-RAK" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Healthcare_Center-RAK/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/1">Healthcare Center-RAK</a>
                                        </h3>
                                        <p class="hot-products__price">Residential Buildings</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/1" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Civil_Defense_Centre/main.webp" alt="Civil Defense Centre" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Civil_Defense_Centre/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/2">Civil Defense Centre</a>
                                        </h3>
                                        <p class="hot-products__price">Turnkey Solutions</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/2" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/National_Housing/main.webp" alt="National Housing" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/National_Housing/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/3">National Housing</a>
                                        </h3>
                                        <p class="hot-products__price">Residential Buildings</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/3" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/46_Villas/main.webp" alt="46 Villas" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/46_Villas/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/4">46 Villas</a>
                                        </h3>
                                        <p class="hot-products__price">Residential Buildings</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/4" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/EQUESTRIAN_STABLES_&amp;_CAMEL_CLUB/main.webp" alt="EQUESTRIAN STABLES &amp; CAMEL CLUB" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/EQUESTRIAN_STABLES_&amp;_CAMEL_CLUB/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/5">EQUESTRIAN STABLES &amp; CAMEL CLUB</a>
                                        </h3>
                                        <p class="hot-products__price">Hospitality Projects</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/5" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Hotel/main.webp" alt="Hotel" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Hotel/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/6">Hotel</a>
                                        </h3>
                                        <p class="hot-products__price">Residential Buildings</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/6" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                            <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single global-hover-card" data-card-hover-processed="1" style="min-height: 548.513px;">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img loading="lazy" data-src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Wedding_Hall_–_Adhan_-_RAK/main.webp" alt="Wedding Hall – Adhan - RAK" class="lazy loaded" src="https://www.orioncc.com/orionFrontAssets/assets/images/project/Wedding_Hall_–_Adhan_-_RAK/main.webp">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="https://www.orioncc.com/projects/7">Wedding Hall – Adhan - RAK</a>
                                        </h3>
                                        <p class="hot-products__price">Turnkey Solutions</p>
                                        <div class="hot-products__btn-box">
                                            <a href="https://www.orioncc.com/projects/7" class="hot-products__btn thm-btn global-hover-btn" data-hover-processed="1">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                                        <div class="testimonial-one__btn-box offset-5">
                        <a href="https://www.orioncc.com/projects" class="testimonial-one__btn thm-btn global-hover-btn" data-hover-processed="1">View all
                            Projects</a>
                    </div>
                </div>
            </div>

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
