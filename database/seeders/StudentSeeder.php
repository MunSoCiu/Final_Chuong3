<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            ['Nguyễn Văn An', 'an@gmail.com', 'Hà Nội'],
            ['Trần Thị Bình', 'binh@gmail.com', 'Hải Phòng'],
            ['Lê Văn Cường', 'cuong@gmail.com', 'Đà Nẵng'],
            ['Phạm Thị Dung', 'dung@gmail.com', 'Huế'],
            ['Hoàng Văn Em', 'em@gmail.com', 'Nghệ An'],
            ['Nguyễn Thị Hoa', 'hoa@gmail.com', 'Hà Nam'],
            ['Trần Văn Hùng', 'hung@gmail.com', 'Nam Định'],
            ['Lê Thị Lan', 'lan@gmail.com', 'Quảng Ninh'],
            ['Phạm Văn Minh', 'minh@gmail.com', 'Thanh Hóa'],
            ['Hoàng Thị Nga', 'nga@gmail.com', 'Bắc Ninh'],
            ['Nguyễn Văn Phúc', 'phuc@gmail.com', 'Hà Nội'],
            ['Trần Thị Quỳnh', 'quynh@gmail.com', 'Hải Dương'],
            ['Lê Văn Sơn', 'son@gmail.com', 'Quảng Bình'],
            ['Phạm Thị Trang', 'trang@gmail.com', 'Đà Nẵng'],
            ['Hoàng Văn Tuấn', 'tuan@gmail.com', 'Hưng Yên'],
            ['Nguyễn Thị Uyên', 'uyen@gmail.com', 'Thái Bình'],
            ['Trần Văn Vinh', 'vinh@gmail.com', 'Hà Nội'],
            ['Lê Thị Xuân', 'xuan@gmail.com', 'Phú Thọ'],
            ['Phạm Văn Yên', 'yen@gmail.com', 'Lào Cai'],
            ['Hoàng Thị Zinh', 'zinh@gmail.com', 'Sơn La'],
        ];

        foreach ($students as $index => $s) {

            // 📅 ngày tạo
            $createdDate = Carbon::now()->subDays($index);

            // 🎓 MSV: 2022 + 4 số
            $msv = '2022' . str_pad($index + 1, 4, '0', STR_PAD_LEFT);

            // 🎂 ngày sinh (18 - 23 tuổi)
            $dob = Carbon::now()->subYears(rand(18, 23))
                ->subDays(rand(0, 365));

            Student::create([
                'name' => $s[0],
                'email' => $s[1],
                'address' => $s[2],
                'msv' => $msv,
                'dob' => $dob,
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
            ]);
        }
    }
}