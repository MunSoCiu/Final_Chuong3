@extends('layouts.master')

@section('content')

<h3>{{ isset($course) ? 'Sửa' : 'Thêm' }} khóa học</h3>

<form method="POST" enctype="multipart/form-data"
      action="{{ isset($course) ? route('courses.update',$course->id) : route('courses.store') }}">

    @csrf
    @if(isset($course)) @method('PUT') @endif

    <div class="mb-2">
        <label>Tên</label>
        <input name="name" class="form-control"
               value="{{ $course->name ?? '' }}">
    </div>

    <div class="mb-2">
        <label>Giá</label>
        <input name="price" class="form-control"
               value="{{ $course->price ?? '' }}">
    </div>

    <div class="mb-2">
        <label>Mô tả</label>
        <textarea name="description" class="form-control">
            {{ $course->description ?? '' }}
        </textarea>
    </div>

    <div class="mb-2">
        <label>Ảnh</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-2">
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>

    <button class="btn btn-primary">Lưu</button>

</form>

@endsection