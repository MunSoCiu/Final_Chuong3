<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success','Thêm thành công');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index')->with('success','Cập nhật thành công');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return back()->with('success','Xóa thành công');
    }
}