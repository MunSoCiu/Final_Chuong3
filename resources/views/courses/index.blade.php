@extends('layouts.master')

@section('content')

<h3>Danh sách khóa học</h3>
<!-- ✅ CSS -->
<style>
.pagination .page-link {
    border-radius: 10px;
    margin: 0 4px;
    color: #333;
    transition: 0.2s;
}
.pagination .page-link:hover {
    background: #0d6efd;
    color: #fff;
}
.pagination .active .page-link {
    background: #0d6efd;
    color: #fff;
    border: none;
}
.pagination .page-item.disabled .page-link {
    color: #aaa;
}
</style>
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
    <td>{{ number_format($c->price, 0, ',', '.') }}</td>
    <td>@include('components.status',['status'=>$c->status])</td>
    <td>{{ $c->lessons_count }}</td>
<td>
    <img 
        src="{{ $c->image 
            ? (str_starts_with($c->image, 'images/') 
                ? asset($c->image) 
                : asset('storage/'.$c->image)) 
            : asset('images/default.jpg') }}"
        width="120"
        style="border-radius:10px; object-fit:cover;">
</td>

    <td>
        <a href="{{ route('courses.edit',$c->id) }}" class="btn btn-warning btn-sm">Sửa</a>

        <form action="{{ route('courses.destroy',$c->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
           <button 
    class="btn btn-danger btn-sm"
    onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này không?')">
    Xóa
</button>
        </form>
    </td>
</tr>
@endforeach

</table>


<div class="d-flex justify-content-center mt-4">
    <ul class="pagination">

        <!-- Prev -->
        @if ($courses->onFirstPage())
            <li class="page-item disabled"><span class="page-link">‹</span></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $courses->previousPageUrl() }}">‹</a>
            </li>
        @endif

        <!-- Numbers -->
        @for ($i = 1; $i <= $courses->lastPage(); $i++)
            <li class="page-item {{ $i == $courses->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $courses->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next -->
        @if ($courses->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $courses->nextPageUrl() }}">›</a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">›</span></li>
        @endif

    </ul>
</div>

@endsection