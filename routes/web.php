<?php

use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\FormController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ServicesController;
use App\Http\Controllers\Website\TeamController;
use App\Models\Form;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/service/{slug}', [ServicesController::class, 'show'])->name('service.show');
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/team/{slug}', [TeamController::class, 'show'])->name('team.show');
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.index');
    Route::post('/form', [FormController::class, 'store'])->name('form.store');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/{serviceid}/{servicetitle}', [BlogController::class, 'showarticles'])
    ->name('blog.showarticles');

});

