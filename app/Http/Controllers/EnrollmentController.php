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
            [
        'name' => $request->name,
        'msv' => '2022' . rand(1000,9999), // ✅ thêm msv
        'dob' => now()->subYears(rand(18,22)),
        'address' => 'Chưa cập nhật'
    ]
        );

        Enrollment::firstOrCreate([
            'course_id' => $request->course_id,
            'student_id' => $student->id
            ],[
    'enrolled_at' => now()
        ]);

        return back()->with('success', 'Đăng ký thành công');
    }

  public function index()
{
    $query = Enrollment::with(['student','course']);

    // lọc theo course nếu có
    if(request('course_id')){
        $query->where('course_id', request('course_id'));
    }

  $enrollments = Enrollment::with(['student','course'])
    ->latest()
    ->paginate(10);

    return view('enrollments.index', compact('enrollments'));
}
}