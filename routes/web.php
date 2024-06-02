<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\EventClientsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionsController;
use App\Http\Controllers\OrganitationAboutsController;
use App\Http\Controllers\OrganitationStatisticsController;
use App\Http\Controllers\OurProgramsController;
use App\Http\Controllers\OurTeamsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchedulesController;
use App\Models\OrganitationKeypoints;
use Illuminate\Support\Facades\Route;

Route::get('ckeditor', [CkeditorController::class, 'index']);

Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/team', [FrontController::class, 'team'])->name('front.team');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/schedule', [FrontController::class, 'schedule'])->name('front.schedule');
Route::post('/schedule/store', [FrontController::class, 'schedule_store'])->name('front.schedule_store');

Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/blog/{slug}', [FrontController::class, 'blog'])->name('blog');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware('can: manage statistics')->group(function (){
            Route::resource('statistics', OrganitationStatisticsController::class);
        });

        Route::middleware('can: manage teams')->group(function (){
            Route::resource('teams', OurTeamsController::class);
        });

        Route::middleware('can: manage programs')->group(function (){
            Route::resource('programs', OurProgramsController::class);
        });

        Route::middleware('can: manage blogs')->group(function (){
            Route::resource('blogs', BlogsController::class);
        });

        Route::middleware('can: manage hero sections')->group(function (){
            Route::resource('hero_sections', HeroSectionsController::class);
        });

        Route::middleware('can: manage abouts')->group(function (){
            Route::resource('abouts', OrganitationAboutsController::class);
        });

        Route::middleware('can: manage keypoints')->group(function (){
            Route::resource('keypoints', OrganitationKeypoints::class);
        });

        Route::middleware('can: manage events')->group(function (){
            Route::resource('events', EventsController::class);
        });

        Route::middleware('can: manage categories')->group(function (){
            Route::resource('categories', CategoriesController::class);
        });

        Route::middleware('can: manage authors')->group(function (){
            Route::resource('authors', AuthorsController::class);
        });

        Route::middleware('can: manage clients')->group(function (){
            Route::resource('clients', EventClientsController::class);
        });

        Route::middleware('can: manage schedules')->group(function (){
            Route::resource('schedules', SchedulesController::class);
        });

        Route::middleware('can: manage faq')->group(function (){
            Route::resource('faqs', FaqController::class);
        });
    });
});

require __DIR__.'/auth.php';
