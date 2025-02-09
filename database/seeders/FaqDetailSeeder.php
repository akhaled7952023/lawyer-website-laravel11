<?php

namespace Database\Seeders;

use App\Models\FaqDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqDetail::create([
            'title' => [
                'ar' => 'نحن هنا للإجابة على جميع استفساراتك ',
                'en' => 'We are here to answer all your inquiries',
            ],
            'image' => 'faq-img1.jpg',
        ]);
    }
}
