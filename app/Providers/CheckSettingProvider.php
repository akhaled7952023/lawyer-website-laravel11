<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class CheckSettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $getSetting = Setting::firstOr(function () {
            return Setting::create([
                'main_email' => 'akhaled795@gmail.com',
                'logo' => 'f342f5eb-a453-48a4-94eb-a0af5bd3be5c1738598809.png',
                'phone_mobile' => '0510105648',

                'adress' => [
                    'ar' => 'الرياض - حي الإزدهار',
                    'en' => 'Riyadh - AlEzdihr',
                ],
                'about' => [
                    'ar' => 'وصف عن الموقع',
                    'en' => 'About the website',
                ],

                // الروابط الاجتماعية
                'social_links' => [
                    [
                        'link' => 'https://facebook.com',
                        'icon' => 'fab fa-facebook',
                    ],
                    [
                        'link' => 'https://twitter.com',
                        'icon' => 'fab fa-twitter',
                    ],
                    [
                        'link' => 'https://instagram.com',
                        'icon' => 'fab fa-instagram',
                    ],
                ],
            ]);
        });

        view()->share('settings', $getSetting);
    }


}
