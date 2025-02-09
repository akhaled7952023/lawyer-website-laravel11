<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'title' => [
                'ar' => 'نبذة عنا',
                'en' => 'Who We Are',
            ],
            'about_us' => [
                'ar' => 'نؤمن بأن العدالة هي أساس المجتمع، ونسعى
                جاهدين لتقديم أفضل الخدمات القانونية التي تضمن حقوق عملائنا وتحمي مصالحهم. بفضل خبرتنا
                 العميقة وفريقنا المتخصص، نعمل على تقديم استشارات وحلول قانونية
                 فعالة في مختلف المجالات، مع التزام كامل بالمهنية والنزاهة.',
                'en' => 'we believe that justice is the foundation of society, and we strive to provide the best
                 legal services to protect our clients rights and interests.',
            ],
            'image' => 'about-img.jpg',
            'number' => '+55',
            'content' => [
                [
                    'title_ar' => 'مهمتنا',
                    'title_en' => 'Our Mission',
                    'description_ar' => 'مهمتنا هي تقديم خدمات قانونية عالية الجودة تعتمد على الدقة،
                    الاحترافية، والشفافية، لمساعدة عملائنا في تحقيق العدالة وحماية حقوقهم بأفضل الطرق الممكنة.',
                    'description_en' => 'Our mission is to provide high-quality legal services based on precision,
                    professionalism, and transparency, helping our clients achieve justice and protect their rights in the best possible way.',
                ],
                [
                    'title_ar' => 'رؤيتنا',
                    'title_en' => 'Our Vision',
                    'description_ar' => 'نتطلع لأن نكون من رواد مكاتب المحاماة، وأن نُعرف بقدرتنا على تقديم حلول قانونية مبتكرة وفعالة،
                     مع بناء علاقات طويلة الأمد قائمة على الثقة مع عملائنا.',
                    'description_en' => 'We aspire to be among the leading law firms, known for our ability to provide
                    innovative and effective legal solutions while building long-term relationships based on trust with our clients.',
                ],
                [
                    'title_ar' => 'قيمنا',
                    'title_en' => 'Our Values',
                    'description_ar' => 'العدالة: نؤمن بأن تحقيق العدل هو جوهر رسالتنا.',
                    'description_en' => 'We believe that achieving justice is at the core of our mission',
                ],

            ],
        ]);
    }
}
