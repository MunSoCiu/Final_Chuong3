@extends('layouts.master')

@section('content')


<h3>Sửa khóa học</h3>

<form method="POST" enctype="multipart/form-data"
      action="{{ route('courses.update',$course->id) }}">

    @csrf
    @method('PUT')

    <!-- TÊN -->
    <div class="mb-3">
        <label>Tên</label>
        <input name="name" class="form-control"
               value="{{ old('name',$course->name) }}">
    </div>

    <!-- GIÁ -->
    <div class="mb-3">
        <label>Giá</label>
        <input name="price" class="form-control"
               value="{{ old('price',$course->price) }}">
    </div>

    <!-- MÔ TẢ -->
    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description',$course->description) }}</textarea>
    </div>

    <!-- ẢNH -->
    <div class="mb-3">
        <label>Ảnh</label>

        @if($course->image)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$course->image) }}" width="120">
            </div>
        @endif

        <input type="file" name="image" class="form-control">
    </div>

    <!-- STATUS -->
    <div class="mb-3">
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="draft" {{ $course->status=='draft'?'selected':'' }}>Draft</option>
            <option value="published" {{ $course->status=='published'?'selected':'' }}>Published</option>
        </select>
    </div>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Quay lại</a>

</form>

@endsection