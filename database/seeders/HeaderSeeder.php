<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Header;

class HeaderSeeder extends Seeder
{
    public function run()
    {
            Header::create([
                'image' => 'f17040d7-a5d8-4e1a-9309-8719a36b4d5a1739096026.png',
                'firstsolgan' => [
                    'ar' => 'خبراء القانون',
                    'en' => 'Law experts',
                ],
                'secondsolgan' => [
                    'ar' => 'نحمي حقوقك دائماً.',
                    'en' => 'protect your rights',
                ],
                'textbutton' => [
                    'ar' => 'تواصل معنا',
                    'en' => 'Contact Us',
                ],
                'link' => '#Contact Us',
                'features' => [
                    [
                        'text_ar' => 'الاحترافية',
                        'text_en' => 'Professionalism ',
                        'image' => 'LawyerAdvice.svg',
                    ],
                    [
                        'text_ar' => 'إستشارات قانونية',
                        'text_en' => 'Legal Counsel',
                        'image' => 'Legal-Counsel.svg',
                    ],
                    [
                        'text_ar' => 'الخبرة',
                        'text_en' => 'Expertise',
                        'image' => 'Court-Performance.svg',
                    ],
                    [
                        'text_ar' => 'الالتزام',
                        'text_en' => 'Commitment',
                        'image' => 'Global-Lawyer.svg',
                    ],
                ],
            ]);

    }
}
