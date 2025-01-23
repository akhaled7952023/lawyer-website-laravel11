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
                'ar' => 'تطوير الويب',
                'en' => 'Web Development',
            ],
            'image' => 'uploads/general/web_development.jpg',
            'skills' => [
                ['name_ar' => 'لارافيل', 'name_en' => 'Laravel', 'percentage' => 95],
                ['name_ar' => 'فيو', 'name_en' => 'Vue.js', 'percentage' => 90],
                ['name_ar' => 'ريأكت', 'name_en' => 'React', 'percentage' => 85],
            ],
            'counters' => [
                ['name_ar' => 'عدد المشاريع', 'name_en' => 'Projects', 'value' => '+50'],
                ['name_ar' => 'سنوات الخبرة', 'name_en' => 'Years of Experience', 'value' => '10'],
                ['name_ar' => 'العملاء السعداء', 'name_en' => 'Happy Clients', 'value' => '+100'],
            ],
        ]);
    }
}
