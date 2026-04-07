<!DOCTYPE html>
<html>
<head>
    <title>Trang khóa học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.pagination-custom {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 20px;
}

.page-btn {
    padding: 8px 12px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #333;
    border-radius: 5px;
}

.page-btn:hover {
    background: #007bff;
    color: white;
}

.page-active {
    background: #007bff;
    color: white;
}

.desc-2line {
    display: -webkit-box;
    -webkit-line-clamp: 2; /* số dòng */
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<body class="d-flex flex-column min-vh-100">

@include('components.header')

<div class="container mt-4 flex-grow-1">

    <h2 class="mb-4">📚 Danh sách khóa học</h2>

    {{-- 🔍 FORM SEARCH --}}
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

    {{-- 📦 COURSE LIST --}}
    <div class="row">

        @foreach($courses as $c)
       <div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">

        {{-- IMAGE --}}
        <img src="{{ $c->image ? asset('storage/'.$c->image) : 'https://via.placeholder.com/300x200' }}"
             class="card-img-top"
             style="height:200px; object-fit:cover;">

        <div class="card-body d-flex flex-column">

            {{-- TITLE --}}
            <h5 class="fw-bold">{{ $c->name }}</h5>

            {{-- DESCRIPTION (2 dòng) --}}
            <p class="text-muted desc-2line">
                {{ $c->description }}
            </p>

            {{-- PRICE --}}
            <p class="fw-bold text-danger mt-auto">
                {{ number_format($c->price) }}đ
            </p>

            {{-- STATUS --}}
            <span class="badge bg-success">
                {{ $c->status }}
            </span>

        </div>

        <div class="card-footer text-center">
            <a href="#" class="btn btn-outline-primary btn-sm">
                Xem chi tiết
            </a>
        </div>

    </div>
</div>
        @endforeach

    </div>

   <div class="pagination-custom">

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

</div>

@include('components.footer')

</body>
</html>