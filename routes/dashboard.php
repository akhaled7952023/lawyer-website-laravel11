<?php

use App\Http\Controllers\Dashboard\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\BlogController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\RolesAndManagers\ManagerController;
use App\Http\Controllers\Dashboard\RolesAndManagers\RoleController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\HeaderController;
use App\Http\Controllers\Dashboard\MessagesController;
use App\Http\Controllers\Dashboard\SkillController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\FaqDetailController;
use App\Http\Controllers\UploadImageSummernoteController;
use App\Http\Controllers\WelcomeController;
use App\Models\AboutUs;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ################# Auth ##############################
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        ################################# Reset Password #############################
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(AuthController::class)->group(function () {
                Route::get('email', 'showEmailForm')->name('email');
                Route::post('email', 'sendOtp')->name('email.post');
                Route::get('verify', 'showOtpForm')->name('verify');
                Route::post('verify', 'verifyOtp')->name('verify.post');
                Route::get('reset', 'showResetForm')->name('reset');
                Route::post('reset', 'resetPassword')->name('reset.post');
            });
        });
        ################################## End Pssword #################################

        ################# Protected Routed  ##############################
        Route::group(['middleware' => 'auth'], function () {
            // ####################################### Welcome Routes #######################################
            Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');

            ####################################### Welcome Routes #######################################
            Route::resource('roles', RoleController::class);
            Route::resource('managers', ManagerController::class);
            Route::patch('/managers/{id}/role', [ManagerController::class, 'updateprofile'])->name('dashboard.managers.updateprofile');

            ####################################### Settings Routes #######################################
            Route::get('settings', [SettingController::class, 'index'])->name('settings');
            Route::put('settings/{id}', [SettingController::class, 'update'])->name('settings.update');

            ####################################### Clients Routes #######################################
            Route::get('clients', [ClientController::class, 'index'])->name('clients');
            Route::put('clients/', [ClientController::class, 'update'])->name('clients.update');
            Route::delete('clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete');

            ####################################### Services Routes #######################################
            Route::resource('services', ServiceController::class);

            ####################################### Upload Image SummerNote #############################
            Route::post('sumernoteimage', [UploadImageSummernoteController::class, 'index'])->name('sumernoteimage');

            ####################################### Header Routes #######################################
            Route::get('header', [HeaderController::class, 'index'])->name('header');
            Route::put('header/{id}', [HeaderController::class, 'update'])->name('header.update');

            ####################################### Skill Routes #######################################
            Route::get('skills', [SkillController::class, 'index'])->name('skills');
            Route::put('skills/{id}', [SkillController::class, 'update'])->name('skills.update');

            ####################################### Testmonials Routes #######################################
            Route::resource('testimonials', TestimonialController::class);

            ####################################### Testmonials Routes #######################################
            Route::resource('faq', FaqController::class);
            Route::get('/faqdetails', [FaqDetailController::class, 'index'])->name('faqdetails.index');
            Route::put('/faqdetails/{id}', [FaqDetailController::class, 'update'])->name('faqdetails.update');

            ####################################### Team Routes #######################################
            Route::resource('teams', TeamController::class);

            ####################################### About Us Routes #######################################
            Route::get('about', [AboutController::class, 'index'])->name('about');
            Route::put('about/{id}', [AboutController::class, 'update'])->name('about.update');

            ####################################### Message Routes #######################################
            Route::get('messages', [MessagesController::class, 'index'])->name('messages.index');
            ####################################### Team Routes #######################################
            Route::resource('blog', BlogController::class);

        });
    },
);
