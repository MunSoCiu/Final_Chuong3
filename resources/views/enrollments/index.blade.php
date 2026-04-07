@extends('layouts.master')

@section('content')

<h3>Danh sách đăng ký khóa học</h3>

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

<table class="table table-bordered">
<tr>
    <th>Học viên</th>
    <th>Khóa học</th>
    <th>Ngày</th>
    <th>Giờ</th>
</tr>

@foreach($enrollments as $e)
<tr>
    <td>{{ $e->student->name }}</td>
    <td>{{ $e->course->name }}</td>
    <td>{{ $e->enrolled_at ? $e->enrolled_at->format('d/m/Y') : '' }}</td>
    <td>{{ $e->enrolled_at ? $e->enrolled_at->format('H:i') : '' }}</td>
</tr>
@endforeach

</table>

<!-- ✅ PAGINATION -->
<div class="d-flex justify-content-center mt-4">
    <ul class="pagination">

        <!-- Prev -->
        @if ($enrollments->onFirstPage())
            <li class="page-item disabled"><span class="page-link">‹</span></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $enrollments->previousPageUrl() }}">‹</a>
            </li>
        @endif

        <!-- Numbers -->
        @for ($i = 1; $i <= $enrollments->lastPage(); $i++)
            <li class="page-item {{ $i == $enrollments->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $enrollments->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next -->
        @if ($enrollments->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $enrollments->nextPageUrl() }}">›</a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">›</span></li>
        @endif

    </ul>
</div>

@endsection