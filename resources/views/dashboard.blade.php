@extends('layouts.master')

@section('content')

<h3>📊 Dashboard</h3>

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h6>Tổng khóa học</h6>
            <h3>{{ $totalCourses }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h6>Tổng học viên</h6>
            <h3>{{ $totalStudents }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h6>Doanh thu</h6>
            <h3>{{ number_format($totalRevenue) }}đ</h3>
        </div>
    </div>

</div>

{{-- 📊 CHART --}}
<div class="row mb-4">

    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h6>📈 Học viên (30 ngày)</h6>
            <canvas id="studentChart"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h6>💰 Doanh thu</h6>
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h6>📚 Khóa học phổ biến</h6>
            <canvas id="courseChart"></canvas>
        </div>
    </div>
</div>

<hr>

{{-- 🔥 TOP COURSE --}}
<h5>🔥 Khóa học nổi bật</h5>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Học viên</th>
</tr>

@foreach(\App\Models\Course::withCount('enrollments')->orderBy('enrollments_count')->get() as $c)
<tr>
    <td>{{ $c->name }}</td>
    <td>{{ $c->enrollments_count }}</td>
</tr>
@endforeach

</table>

<hr>

{{-- 🆕 LATEST --}}
<h5>🆕 Khóa học mới</h5>

<table class="table table-hover table-bordered">
<tr>
    <th>#</th>
    <th>Tên khóa học</th>
    <th>Ngày tạo</th>
</tr>

@foreach($latestCourses as $i => $course)
<tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $course->name }}</td>
    <td>{{ $course->created_at->format('d/m/Y') }}</td>
</tr>
@endforeach

</table>

@endsection

{{-- ✅ SCRIPT CHUẨN --}}
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const studentData = @json($studentsChart);
    const revenueData = @json($revenueChart);
    const courseData = @json($courseChart);

    // 📊 Student Chart
    const studentEl = document.getElementById('studentChart');
    if (studentEl) {
        new Chart(studentEl, {
            type: 'line',
            data: {
                labels: Object.keys(studentData),
                datasets: [{
                    label: 'Học viên',
                    data: Object.values(studentData),
                    tension: 0.3
                }]
            }
        });
    }

    // 💰 Revenue Chart
    const revenueEl = document.getElementById('revenueChart');
    if (revenueEl) {
        new Chart(revenueEl, {
            type: 'bar',
            data: {
                labels: Object.keys(revenueData),
                datasets: [{
                    label: 'Doanh thu',
                    data: Object.values(revenueData)
                }]
            }
        });
    }

    // 📚 Course Chart
    const courseEl = document.getElementById('courseChart');
    if (courseEl) {
        new Chart(courseEl, {
            type: 'pie',
            data: {
                labels: courseData.map(c => c.name),
                datasets: [{
                    data: courseData.map(c => c.enrollments_count)
                }]
            }
        });
    }

});
</script>

@endsection