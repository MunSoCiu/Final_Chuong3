<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    // 📌 Danh sách
    public function index()
    {
        $courses = Course::withCount('lessons')
            ->latest()
            ->paginate(5);

        return view('courses.index', compact('courses'));
    }

    // 📌 Form thêm
    public function create()
    {
        return view('courses.create');
    }

    // 📌 Lưu
    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        // slug
        $data['slug'] = Str::slug($data['name']);

        // upload ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($data);

        return redirect()->route('courses.index')
            ->with('success', 'Thêm khóa học thành công');
    }

    // 📌 Form sửa
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // 📌 Update
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);

        return redirect()->route('courses.index')
            ->with('success', 'Cập nhật thành công');
    }

    // 📌 Xóa mềm
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Đã xóa (soft delete)');
    }

    // 📌 Khôi phục
    public function restore($id)
    {
        Course::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Đã khôi phục');
    }
}