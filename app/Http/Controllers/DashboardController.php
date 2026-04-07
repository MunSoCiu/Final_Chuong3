<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
   public function index()
{
    $totalCourses = Course::count();
    $totalStudents = Enrollment::count();

    // 💰 doanh thu
    $totalRevenue = DB::table('enrollments')
        ->join('courses', 'enrollments.course_id', '=', 'courses.id')
        ->sum('courses.price');

    // 📊 học viên 30 ngày
    $studentsChart = DB::table('enrollments')
        ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->where('created_at', '>=', now()->subDays(30))
        ->groupBy('date')
        ->pluck('total', 'date');

    // 💰 doanh thu theo ngày
    $revenueChart = DB::table('enrollments')
        ->join('courses', 'enrollments.course_id', '=', 'courses.id')
        ->selectRaw('DATE(enrollments.created_at) as date, SUM(courses.price) as total')
        ->groupBy('date')
        ->pluck('total', 'date');

    // 📚 course chart
    $courseChart = Course::withCount('enrollments')
        ->orderByDesc('enrollments_count')
        ->take(5)
        ->get();

    // 🆕 latest
    $latestCourses = Course::latest()->take(5)->get();

    return view('dashboard', compact(
        'totalCourses',
        'totalStudents',
        'totalRevenue',
        'studentsChart',   // 👈 QUAN TRỌNG
        'revenueChart',    // 👈
        'courseChart',     // 👈
        'latestCourses'
    ));
}
}