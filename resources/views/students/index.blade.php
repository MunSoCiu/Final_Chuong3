@extends('layouts.master')

@section('content')

<h3>Danh sách học viên</h3>
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
<a href="{{ route('students.create') }}" class="btn btn-success mb-3">+ Thêm</a>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Email</th>
    <th>MSV</th>
    <th>Ngày sinh</th>
    <th>Địa chỉ</th>
    <th>Ngày tạo</th>
    <th>Action</th>
</tr>

@foreach($students as $s)
<tr>
    <td>{{ $s->name }}</td>
    <td>{{ $s->email }}</td>

    <!-- MSV -->
    <td>{{ $s->msv }}</td>

    <!-- Ngày sinh -->
    <td>{{ $s->dob ? $s->dob->format('d/m/Y') : '' }}</td>

    <!-- Địa chỉ -->
    <td>{{ $s->address }}</td>

    <!-- Ngày tạo -->
    <td>{{ $s->created_at->format('d/m/Y') }}</td>

    <td>
        <a href="{{ route('students.edit',$s->id) }}" class="btn btn-warning btn-sm">Sửa</a>

        <form action="{{ route('students.destroy',$s->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
@endforeach

</table>


<div class="d-flex justify-content-center mt-4">
    <ul class="pagination">

        <!-- Prev -->
        @if ($students->onFirstPage())
            <li class="page-item disabled"><span class="page-link">‹</span></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $students->previousPageUrl() }}">‹</a>
            </li>
        @endif

        <!-- Numbers -->
        @for ($i = 1; $i <= $students->lastPage(); $i++)
            <li class="page-item {{ $i == $students->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next -->
        @if ($students->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $students->nextPageUrl() }}">›</a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">›</span></li>
        @endif

    </ul>
</div>
@endsection