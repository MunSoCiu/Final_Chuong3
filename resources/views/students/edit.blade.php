@extends('layouts.master')

@section('content')

<h3>Sửa học viên</h3>

<form method="POST" action="{{ route('students.update',$student->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tên</label>
        <input name="name" class="form-control"
               value="{{ $student->name }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control"
               value="{{ $student->email }}">
    </div>
    <div class="mb-3">
        <label>MSV</label>
        <input name="msv" class="form-control"
               value="{{ $student->msv }}">
    </div>
        <div class="mb-3">
        <label>Ngày sinh</label>
        <input name="dob" type="date" class="form-control"
               value="{{ $student->dob }}">
    </div><div class="mb-3">
        <label>Địa Chỉ </label>
        <input name="address" class="form-control"
               value="{{ $student->address }}">
    </div>
        
    <button class="btn btn-primary">Cập nhật</button>
</form>

@endsection