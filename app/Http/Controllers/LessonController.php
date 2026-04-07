<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($courseId)
    {
        $course = Course::with(['lessons' => function ($q) {
            $q->orderBy('order');
        }])->findOrFail($courseId);

        return view('lessons.index', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'order' => 'required|integer'
        ]);

        Lesson::create($request->all());

        return back()->with('success', 'Thêm bài học thành công');
    }

    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update($request->all());

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return back()->with('success', 'Đã xóa');
    }
}