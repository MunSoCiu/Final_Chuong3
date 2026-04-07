@extends('layouts.master')

@section('content')

<h3>📊 Dashboard</h3>

<div class="row">

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Tổng khóa học</h5>
            <h3>{{ $totalCourses }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Tổng học viên</h5>
            <h3>{{ $totalStudents }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Doanh thu</h5>
            <h3>{{ number_format($totalRevenue) }}đ</h3>
        </div>
    </div>

</div>

<hr>

<h5>🔥 Khóa học nổi bật</h5>
@if($topCourse)
    <p>{{ $topCourse->name }} ({{ $topCourse->enrollments_count }} học viên)</p>
@endif

<hr>

<h5>🆕 Khóa học mới</h5>
<ul>
@foreach($latestCourses as $course)
    <li>{{ $course->name }}</li>
@endforeach
</ul>

@endsection