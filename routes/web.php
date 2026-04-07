<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Course;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

Route::get('/dashboard', [DashboardController::class, 'index']);

// ===== COURSES =====
Route::resource('courses', CourseController::class);

// ===== STUDENTS =====
Route::resource('students', StudentController::class);

// ===== LESSONS =====
Route::get('lessons/{course}', [LessonController::class, 'index'])->name('lessons.index');
Route::delete('lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

// ===== ENROLLMENTS (SỬA CHUẨN) =====
Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

// ===== HOME =====
Route::get('/', function (Request $request) {

    $query = Course::query();

    // 🔍 search KHÔNG phân biệt hoa thường
    if ($request->keyword) {
        $keyword = strtolower($request->keyword);
        $query->whereRaw('LOWER(name) LIKE ?', ["%$keyword%"]);
    }

    // 🎯 lọc trạng thái
    if ($request->status) {
        $query->where('status', $request->status);
    }

    // 💰 lọc giá
    if ($request->min_price) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->max_price) {
        $query->where('price', '<=', $request->max_price);
    }

    $query->where('status', 'published');

    $courses = $query->latest()->paginate(6);

    return view('home', compact('courses'));
});