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
            ['Laravel cơ bản', 199000, 'Học Laravel từ đầu đến cuối cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với Laravel framework.'],
            ['Laravel nâng cao', 299000, 'Service, Repository pattern, API, Testing và nhiều hơn nữa cho người đã có kiến thức cơ bản về Laravel.'],
            ['PHP từ A-Z', 150000, 'Nền tảng PHP cho người mới bắt đầu.'],
            ['JavaScript cơ bản', 120000, 'JS cho người mới bắt đầu.'],
            ['JavaScript nâng cao', 220000, 'Async, ES6+, Frameworks.'],
            ['ReactJS cơ bản', 250000, 'Frontend hiện đại với ReactJS.'],
            ['ReactJS nâng cao', 350000, 'Hooks, Context API, Redux.'],
            ['NextJS Fullstack', 350000, 'SSR + API với NextJS.'],
            ['NodeJS API', 200000, 'Xây dựng RESTful API với NodeJS.'],
            ['Flutter cơ bản', 180000, 'Xây dựng app mobile với Flutter.'],
            ['Flutter nâng cao', 280000, 'State management nâng cao.'],
            ['MySQL cơ bản', 100000, 'Query dữ liệu MySQL.'],
            ['Docker cho Dev', 210000, 'Deploy app với Docker.'],
            ['Git & GitHub', 90000, 'Quản lý code.'],
            ['HTML CSS', 80000, 'Frontend nền tảng.'],
            ['Tailwind CSS', 110000, 'UI nhanh với Tailwind.'],
            ['Python cơ bản', 130000, 'Ngôn ngữ Python.'],
            ['AI cơ bản', 400000, 'Machine Learning.'],
            ['Data Science', 420000, 'Xử lý dữ liệu.'],
            ['UI/UX Design', 260000, 'Thiết kế giao diện.'],
            ['System Design', 500000, 'Thiết kế hệ thống.'],
        ];

        foreach ($courses as $index => $course) {

            // mỗi course lùi ngày khác nhau
            $date = Carbon::now()->subDays($index);

            Course::create([
                'name' => $course[0],
                'slug' => Str::slug($course[0]),
                'price' => $course[1],
                'description' => $course[2],
                'status' => 'published',
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}