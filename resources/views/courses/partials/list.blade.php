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
    <th>Ngày tạo</th>
    <th>Action</th>
</tr>

@foreach($courses as $c)
<tr>
    <td>{{ $c->name }}</td>

    <td>{{ number_format($c->price, 0, ',', '.') }}</td>

    <td>@include('components.status',['status'=>$c->status])</td>

    <td>{{ $c->lessons_count }}</td>

    <td>
        @if($c->image)
            <img src="{{ asset('storage/'.$c->image) }}" width="80">
        @endif
    </td>

    <td>
        {{ $c->created_at->format('d/m/Y') }}
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

<div class="pagination-custom">

@if ($courses->onFirstPage())
<span class="page-btn">‹</span>
@else
<a href="{{ $courses->previousPageUrl() }}" class="page-btn">‹</a>
@endif

@for ($i=1;$i<=$courses->lastPage();$i++)
<a href="{{ $courses->url($i) }}" 
class="page-btn {{ $i==$courses->currentPage()?'page-active':'' }}">
{{ $i }}
</a>
@endfor

@if ($courses->hasMorePages())
<a href="{{ $courses->nextPageUrl() }}" class="page-btn">›</a>
@else
<span class="page-btn">›</span>
@endif

</div>
@endsection