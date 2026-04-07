@extends('layouts.master')

@section('content')

<h2 class="mb-4">📚 Danh sách khóa học</h2>

<style>
.course-card {
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
    border: none;
}
.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.course-img {
    height: 200px;
    object-fit: cover;
}
.course-price {
    color: #e53935;
    font-weight: bold;
    font-size: 18px;
}
.course-btn {
    border-radius: 10px;
    font-weight: 500;
    height: 42px; /* ✅ FIX NÚT BẰNG NHAU */
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn-detail {
    background: #17a2b8;
    color: white;
}
.btn-join {
    background: #28a745;
    color: white;
}
.btn-detail:hover {
    background: #138496;
}
.btn-join:hover {
    background: #218838;
}
.course-btn:hover {
    transform: scale(1.03);
}
</style>

<!-- ALERT -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- FORM SEARCH -->
<form method="GET" class="row mb-4">

    <div class="col-md-3">
        <input type="text" name="keyword" class="form-control"
               placeholder="Tìm khóa học..."
               value="{{ request('keyword') }}">
    </div>

    <div class="col-md-2">
        <select name="status" class="form-control">
            <option value="">-- Trạng thái --</option>
            <option value="published" {{ request('status')=='published'?'selected':'' }}>Published</option>
            <option value="draft" {{ request('status')=='draft'?'selected':'' }}>Draft</option>
        </select>
    </div>

    <div class="col-md-2">
        <input type="number" name="min_price" class="form-control"
               placeholder="Giá từ"
               value="{{ request('min_price') }}">
    </div>

    <div class="col-md-2">
        <input type="number" name="max_price" class="form-control"
               placeholder="Đến"
               value="{{ request('max_price') }}">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary w-100">Tìm</button>
    </div>

</form>

<!-- LIST -->
<div class="row">

@foreach($courses as $c)
<div class="col-md-4 mb-4">
    <div class="card course-card">

        <img src="{{ $c->image ? asset('storage/'.$c->image) : 'https://via.placeholder.com/300x200' }}"
             class="card-img-top course-img">

        <div class="card-body d-flex flex-column">

            <h5 class="fw-bold mb-2">{{ $c->name }}</h5>

            <p class="text-muted desc-2line mb-2">
                {{ $c->description }}
            </p>

            <div class="course-price mb-2">
                {{ number_format($c->price) }}đ
            </div>

            <span class="badge bg-success mb-3">
                {{ $c->status }}
            </span>

            <!-- BUTTON -->
            <div class="d-flex gap-2 mt-auto">

                <!-- Chi tiết -->
                <button class="btn btn-detail course-btn w-50"
                        data-bs-toggle="modal"
                        data-bs-target="#courseModal{{ $c->id }}">
                    Chi tiết
                </button>

                <!-- Tham gia -->
                <form action="{{ route('enrollments.store') }}" method="POST" class="w-50 d-flex">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $c->id }}">
                    <input type="hidden" name="name" value="Guest User">
                    <input type="hidden" name="email" value="guest{{ $c->id }}@mail.com">

                    <button class="btn btn-join course-btn w-100">
                        Tham gia
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="courseModal{{ $c->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">{{ $c->name }}</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p><strong>Giá:</strong> {{ number_format($c->price) }}đ</p>
        <p>{{ $c->description }}</p>
      </div>

      <div class="modal-footer">
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $c->id }}">
            <input type="hidden" name="name" value="Guest User">
            <input type="hidden" name="email" value="guest{{ $c->id }}@mail.com">

            <button class="btn btn-success">Tham gia ngay</button>
        </form>
      </div>

    </div>
  </div>
</div>

@endforeach

</div>

<!-- PAGINATION -->
<div class="pagination-custom mt-3">

@if ($courses->onFirstPage())
    <span class="page-btn">‹</span>
@else
    <a href="{{ $courses->previousPageUrl() }}" class="page-btn">‹</a>
@endif

@for ($i = 1; $i <= $courses->lastPage(); $i++)
    <a href="{{ $courses->url($i) }}" 
       class="page-btn {{ $i == $courses->currentPage() ? 'page-active' : '' }}">
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