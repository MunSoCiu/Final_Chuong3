<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['Laravel cơ bản', 199.000, 'Học Laravel từ đầu đến cuối cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với Laravel framework.  '],
            ['Laravel nâng cao', 299.000, 'Service, Repository pattern, API, Testing và nhiều hơn nữa cho người đã có kiến thức cơ bản về Laravel và muốn nâng cao kỹ năng của mình để trở thành một Laravel developer chuyên nghiệp '],
            ['PHP từ A-Z', 150.000, 'Nền tảng PHP cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với PHP.  '],
            ['JavaScript cơ bản', 120.000, 'JS cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với JavaScript. '],
            ['JavaScript nâng cao', 220.000, 'Async, ES6+, Frameworks và nhiều hơn nữa cho người đã có kiến thức cơ bản về JavaScript và muốn nâng cao kỹ năng của mình để trở thành một JavaScript developer chuyên nghiệp '],
            ['ReactJS cơ bản', 250.000, 'Frontend hiện đại cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với ReactJS. '],
            ['ReactJS nâng cao', 350.000, 'Hooks, Context API, Redux và nhiều hơn nữa cho người đã có kiến thức cơ bản về ReactJS và muốn nâng cao kỹ năng của mình để trở thành một ReactJS developer chuyên nghiệp '],
            ['NextJS Fullstack', 350.000, 'SSR + API cho người đã có kiến thức cơ bản về ReactJS và muốn nâng cao kỹ năng của mình để trở thành một NextJS developer chuyên nghiệp '],
            ['NodeJS API', 200.000, 'RESTful API cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng API với NodeJS. '],
            ['Flutter cơ bản', 180.000, 'Mobile app cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng di động với Flutter. '],
            ['Flutter nâng cao', 280.000, 'State management cho người đã có kiến thức cơ bản về Flutter và muốn nâng cao kỹ năng của mình để trở thành một Flutter developer chuyên nghiệp '],
            ['MySQL cơ bản', 100.000, 'Query dữ liệu cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với MySQL. '],
            ['Docker cho Dev', 210.000, 'Deploy app cho người đã có kiến thức cơ bản về Docker và muốn nâng cao kỹ năng của mình để trở thành một Docker developer chuyên nghiệp '],
            ['Git & GitHub', 90.000, 'Quản lý code cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với Git và GitHub. '],
            ['HTML CSS', 80.000, 'Frontend nền tảng cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với HTML và CSS. '],
            ['Tailwind CSS', 110.000, 'UI nhanh cho người đã có kiến thức cơ bản về CSS và muốn nâng cao kỹ năng của mình để trở thành một Tailwind CSS developer chuyên nghiệp '],
            ['Python cơ bản', 130.000, 'Ngôn ngữ phổ biến cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với Python. '],
            ['AI cơ bản', 400.000, 'Machine Learning cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với AI. '],
            ['Data Science', 420.000, 'Xử lý dữ liệu cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với Data Science. '],
            ['UI/UX Design', 260.000, 'Thiết kế giao diện cho người mới bắt đầu với các bài học chi tiết và dễ hiểu để xây dựng ứng dụng web với UI/UX Design. '],
            ['System Design', 500.000, 'Thiết kế hệ thống cho người đã có kiến thức cơ bản và muốn nâng cao kỹ năng của mình để trở thành một System Design developer chuyên nghiệp '],
        ];

        foreach ($courses as $course) {
            Course::create([
                'name' => $course[0],
                'slug' => Str::slug($course[0]),
                'price' => $course[1],
                'description' => $course[2],
                'status' => 'published'
            ]);
        }
    }
}