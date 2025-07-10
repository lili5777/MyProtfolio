<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $service = [
            [
                'icon' => 'responsive.svg',
                'name' => 'Web Developer',
                'desc' => 'My role as a web developer involves designing and developing respons and user-friendly web applications.',
            ],
            [
                'icon' => 'teacher.png',
                'name' => 'Teacher',
                'desc' => 'As a teacher, my main task is to ensure that the knowledge I receive is truly accessible and useful.',
            ],
            [
                'icon' => 'pencil-case.svg',
                'name' => 'Writer',
                'desc' => 'As a writer, I am responsible for creating engaging and informative content for various media platforms.',
            ],
            [
                'icon' => 'analytics.svg',
                'name' => 'Marketing',
                'desc' => 'Leading digital marketing strategies to enhance visibility and conversion across online platforms.',
            ],
            [
                'icon' => 'music.png',
                'name' => 'Speaker',
                'desc' => 'As a speaker, my main task is to ensure that the information I present is truly accessible and valuable to my audience.',
            ],

        ];

        foreach ($service as $key => $value) {
            Service::create($value);
        }
    }
}
