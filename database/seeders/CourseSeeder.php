<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Course;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['Laravel cơ bản', 199000, 'Học Laravel từ đầu...'],
            ['Laravel nâng cao', 299000, 'Service, Repository...'],
            ['PHP từ A-Z', 150000, 'Nền tảng PHP...'],
            ['JavaScript cơ bản', 120000, 'JS cho người mới...'],
            ['JavaScript nâng cao', 220000, 'Async, ES6+...'],
            ['ReactJS cơ bản', 250000, 'Frontend hiện đại...'],
            ['ReactJS nâng cao', 350000, 'Hooks, Redux...'],
            ['NextJS Fullstack', 350000, 'SSR + API...'],
            ['NodeJS API', 200000, 'RESTful API...'],
            ['Flutter cơ bản', 180000, 'App mobile...'],
            ['Flutter nâng cao', 280000, 'State nâng cao...'],
            ['MySQL cơ bản', 100000, 'Query dữ liệu...'],
            ['Docker cho Dev', 210000, 'Deploy app...'],
            ['Git & GitHub', 90000, 'Quản lý code...'],
            ['HTML CSS', 80000, 'Frontend nền tảng...'],
            ['Tailwind CSS', 110000, 'UI nhanh...'],
            ['Python cơ bản', 130000, 'Ngôn ngữ Python...'],
            ['AI cơ bản', 400000, 'Machine Learning...'],
            ['Data Science', 420000, 'Xử lý dữ liệu...'],
            ['UI/UX Design', 260000, 'Thiết kế giao diện...'],
            ['System Design', 500000, 'Thiết kế hệ thống...'],
        ];

        $imageList = [
            'laravel.jpg',
            'react.jpg',
            'flutter.jpg',
            'node.jpg',
            'js.jpg',
        ];

        foreach ($courses as $index => $course) {

            $date = Carbon::now()->subDays($index);

            Course::create([
                'name' => $course[0],
                'slug' => Str::slug($course[0]),
                'price' => $course[1],
                'description' => $course[2],
                'status' => 'published',
                'image' => 'images/' . $imageList[$index % count($imageList)], // ✅ FIX
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}