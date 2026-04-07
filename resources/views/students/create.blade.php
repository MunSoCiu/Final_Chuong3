@extends('layouts.master')

@section('content')

<h3>Thêm học viên</h3>

<form method="POST" action="{{ route('students.store') }}">
    @csrf

    <div class="mb-3">
        <label>Tên</label>
        <input name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control">
    </div>

    <button class="btn btn-primary">Lưu</button>
</form>

@endsection