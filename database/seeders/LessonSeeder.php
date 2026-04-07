<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Course;

class LessonSeeder extends Seeder
{
    public function run()
    {
        foreach (Course::all() as $course) {

            Lesson::create([
                'course_id' => $course->id,
                'title' => 'Giới thiệu',
                'content' => 'Tổng quan khóa học',
                'video_url' => 'https://youtube.com',
                'order' => 1
            ]);

            Lesson::create([
                'course_id' => $course->id,
                'title' => 'Kiến thức chính',
                'content' => 'Nội dung chính',
                'video_url' => 'https://youtube.com',
                'order' => 2
            ]);

            Lesson::create([
                'course_id' => $course->id,
                'title' => 'Thực hành',
                'content' => 'Bài tập thực tế',
                'video_url' => 'https://youtube.com',
                'order' => 3
            ]);
        }
    }
}