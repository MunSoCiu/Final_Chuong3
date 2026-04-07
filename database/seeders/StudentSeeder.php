<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            ['Nguyễn Văn An', 'an@gmail.com'],
            ['Trần Thị Bình', 'binh@gmail.com'],
            ['Lê Văn Cường', 'cuong@gmail.com'],
            ['Phạm Thị Dung', 'dung@gmail.com'],
            ['Hoàng Văn Em', 'em@gmail.com'],
            ['Nguyễn Thị Hoa', 'hoa@gmail.com'],
            ['Trần Văn Hùng', 'hung@gmail.com'],
            ['Lê Thị Lan', 'lan@gmail.com'],
            ['Phạm Văn Minh', 'minh@gmail.com'],
            ['Hoàng Thị Nga', 'nga@gmail.com'],
            ['Nguyễn Văn Phúc', 'phuc@gmail.com'],
            ['Trần Thị Quỳnh', 'quynh@gmail.com'],
            ['Lê Văn Sơn', 'son@gmail.com'],
            ['Phạm Thị Trang', 'trang@gmail.com'],
            ['Hoàng Văn Tuấn', 'tuan@gmail.com'],
            ['Nguyễn Thị Uyên', 'uyen@gmail.com'],
            ['Trần Văn Vinh', 'vinh@gmail.com'],
            ['Lê Thị Xuân', 'xuan@gmail.com'],
            ['Phạm Văn Yên', 'yen@gmail.com'],
            ['Hoàng Thị Zinh', 'zinh@gmail.com'],
        ];

        foreach ($students as $s) {
            Student::create([
                'name' => $s[0],
                'email' => $s[1],
            ]);
        }
    }
}