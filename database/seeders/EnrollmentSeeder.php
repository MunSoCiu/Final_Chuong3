<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [1,1],[1,2],[1,3],
            [2,1],[2,4],[2,5],
            [3,2],[3,6],[3,7],
            [4,3],[4,8],[4,9],
            [5,4],[5,10],[5,11],
            [6,5],[6,12],[6,13],
            [7,6],[7,14],[7,15],
            [8,7],[8,16],[8,17],
            [9,8],[9,18],[9,19],
            [10,9],[10,20],
        ];

        foreach ($data as $item) {
            Enrollment::create([
                'course_id' => $item[0],
                'student_id' => $item[1],
            ]);
        }
    }
}