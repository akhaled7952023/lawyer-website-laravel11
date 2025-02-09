<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'title' => [
                'ar' => 'مهارات قانونية تصنع الفارق',
                'en' => 'Legal skills make a difference',
            ],
            'image' => 'skills-img1.jpg',
            'skills' => [
                ['name_ar' => 'الدقة', 'name_en' => 'Precision', 'percentage' => 95],
                ['name_ar' => 'المرافعة', 'name_en' => 'Advocacy', 'percentage' => 90],
                ['name_ar' => 'التحليل', 'name_en' => 'Analysis', 'percentage' => 100],
            ],
            'counters' => [

                    ['name_ar' => 'عدد القضايا', 'name_en' => 'Cases Number', 'value' => '+50'],
                    ['name_ar' => 'سنوات الخبرة', 'name_en' => 'Experience Years', 'value' => '10'],
                    ['name_ar' => 'عدد العملاء', 'name_en' => 'Clients Number', 'value' => '+100'],
                    ['name_ar' => 'عدد الموظفين', 'name_en' => 'Employees Number', 'value' => '+50']
                ]


        ]);
    }
}
