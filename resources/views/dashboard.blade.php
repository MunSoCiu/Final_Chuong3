@extends('layout.admin')

@section('content')

<h3 class="mb-4">⚙️ Dashboard</h3>

<!-- ================= 📊 FILTER ================= -->


<form method="GET" class="mb-3">
    <select name="type" class="form-control w-auto d-inline" onchange="this.form.submit()">
        <option value="day" {{ $type=='day' ? 'selected' : '' }}>Theo ngày</option>
        <option value="month" {{ $type=='month' ? 'selected' : '' }}>Theo tháng</option>
    </select>
</form>

<!-- ================= 📈 CHART ================= -->
<div class="card p-3 shadow mb-4">
    <canvas id="chart"></canvas>
</div>

<!-- ================= 📦 STATS ================= -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card p-3 text-center shadow">
            <h6>📦 Tổng</h6>
            <h3>{{ $totalProducts }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center shadow">
            <h6>📅 Hôm nay</h6>
            <h3>{{ $todayProducts }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center shadow">
            <h6>📆 Tháng này</h6>
            <h3>{{ $monthProducts }}</h3>
        </div>
    </div>

</div>

<!-- ================= 📂 CATEGORY ================= -->
<h5 class="mb-3">📂 Theo danh mục</h5>

<div class="row mb-4">
@foreach($categoryStats as $c)
    <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm">
            <h6>{{ $c->name }}</h6>
            <h4>{{ $c->products_count }}</h4>
        </div>
    </div>
@endforeach
</div>

<!-- ================= 💰 TOP ================= -->
<h5 class="mb-3">💰 Top sản phẩm giá cao</h5>

<div class="card p-3 shadow mb-4">
<table class="table text-center">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Giá</th>
        </tr>
    </thead>
    <tbody>
    @foreach($topProducts as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td class="text-danger">{{ number_format($p->price) }}đ</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Sản phẩm tạo',
            data: @json($chartData),
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,0.1)',
            fill: true,
            tension: 0.4,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.raw + ' sản phẩm';
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});
</script>
@endpush