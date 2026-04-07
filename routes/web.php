<?php

use Illuminate\Support\Facades\Route;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => view('home'));
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('courses', CourseController::class);

Route::get('lessons/{course}', [LessonController::class, 'index'])->name('lessons.index');
Route::delete('lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

Route::get('enrollments/{course}', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
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

       // 💰 lọc giá (linh hoạt hơn)
    if ($request->min_price) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->max_price) {
        $query->where('price', '<=', $request->max_price);
    }

    // chỉ hiển thị khóa học public
    $query->where('status', 'published');

    $courses = $query->latest()->paginate(6);

    return view('home', compact('courses'));
});