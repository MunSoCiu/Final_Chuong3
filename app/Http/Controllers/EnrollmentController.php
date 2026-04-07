<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        Enrollment::firstOrCreate([
            'course_id' => $request->course_id,
            'student_id' => $student->id
        ]);

        return back()->with('success', 'Đăng ký thành công');
    }

    public function index($courseId)
    {
        $enrollments = Enrollment::with('student')
            ->where('course_id', $courseId)
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }
}