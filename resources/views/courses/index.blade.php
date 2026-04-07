@extends('layouts.master')

@section('content')

<h3>Danh sách khóa học</h3>

<a href="{{ route('courses.create') }}" class="btn btn-success mb-3">+ Thêm</a>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Giá</th>
    <th>Trạng thái</th>
    <th>Bài học</th>
    <th>Ảnh</th>
    <th>Action</th>
</tr>

@foreach($courses as $c)
<tr>
    <td>{{ $c->name }}</td>
    <td>{{ number_format($c->price) }}</td>
    <td>@include('components.status',['status'=>$c->status])</td>
    <td>{{ $c->lessons_count }}</td>
    <td>
        @if($c->image)
            <img src="{{ asset('storage/'.$c->image) }}" width="80">
        @endif
    </td>
    <td>
        <a href="{{ route('courses.edit',$c->id) }}" class="btn btn-warning btn-sm">Sửa</a>

        <form action="{{ route('courses.destroy',$c->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
@endforeach

</table>



@endsection