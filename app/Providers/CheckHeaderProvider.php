<?php

namespace App\Providers;

use App\Models\Header;
use Illuminate\Support\ServiceProvider;

class CheckHeaderProvider extends ServiceProvider
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
        $header = Header::firstOr(function () {
            return Header::create([
                'image' => '38c53e2a-b8e8-4e13-aca2-5f9323b600b21737212866.png',
                'firstsolgan' => [
                    'ar' => 'شعار أول بالعربية',
                    'en' => 'First Slogan in English',
                ],
                'secondsolgan' => [
                    'ar' => 'شعار ثاني بالعربية',
                    'en' => 'Second Slogan in English',
                ],
                'textbutton' => [
                    'ar' => 'اضغط هنا',
                    'en' => 'Click Here',
                ],
                'link' => 'https://example.com',
                'features' => [
                    [
                        'text_ar' => 'محامون متخصصون',
                        'text_en' => 'Lawyer Advice',
                        'image' => 'LawyerAdvice.svg',
                    ],
                    [
                        'text_ar' => 'إستشارات قانونية',
                        'text_en' => 'Legal Counsel',
                        'image' => 'Legal-Counsel.svg',
                    ],
                    [
                        'text_ar' => 'مرافعات قانونية',
                        'text_en' => 'Court Performance',
                        'image' => 'Court-Performance.svg',
                    ],
                    [
                        'text_ar' => 'خبرة قانونية',
                        'text_en' => 'Global Lawyer',
                        'image' => 'Global-Lawyer.svg',
                    ],
                ],
            ]);
        });
    }
}
