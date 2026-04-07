@extends('layouts.master')

@section('content')

<h2 class="mb-4">📚 Danh sách khóa học</h2>

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

.course-card {
    height: 100%;
    display: flex;
    flex-direction: column;
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
.desc-2line {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
}
.course-btn {
    border-radius: 10px;
    font-weight: 500;
    height: 42px;
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
</style>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- LIST -->

<div class="row">

@foreach($courses as $c)

<div class="col-md-4 mb-4">
    <div class="card course-card">


    <!-- IMAGE -->
    <img 
    src="{{ $c->image 
        ? (str_starts_with($c->image, 'images/') 
            ? asset($c->image) 
            : asset('storage/'.$c->image)) 
        : 'https://via.placeholder.com/300x200' }}"
    class="card-img-top course-img">

    <div class="card-body">

        <h5 class="fw-bold">{{ $c->name }}</h5>

        <p class="text-muted desc-2line">
            {{ $c->description }}
        </p>

        <div class="course-price">
            {{ number_format($c->price) }}đ
        </div>

        <div class="mt-auto">

            <span class="badge bg-success mb-2 d-block">
                {{ $c->status }}
            </span>

            <!-- BUTTON -->
            <div class="d-flex gap-2">

                <!-- Chi tiết -->
                <button class="btn btn-detail course-btn w-50"
                        data-bs-toggle="modal"
                        data-bs-target="#courseModal{{ $c->id }}">
                    Chi tiết
                </button>

                <!-- Tham gia -->
                <button class="btn btn-join course-btn w-50"
                        data-bs-toggle="modal"
                        data-bs-target="#joinModal{{ $c->id }}">
                    Tham gia
                </button>

            </div>
        </div>

    </div>
</div>


</div>

<!-- MODAL CHI TIẾT -->

<div class="modal fade" id="courseModal{{ $c->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">


  <div class="modal-header">
    <h5 class="modal-title">{{ $c->name }}</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <div class="modal-body">

    <img 
    src="{{ $c->image 
        ? (str_starts_with($c->image, 'images/') 
            ? asset($c->image) 
            : asset('storage/'.$c->image)) 
        : 'https://via.placeholder.com/300x200' }}"
    class="img-fluid mb-3">

    <p><strong>Giá:</strong> {{ number_format($c->price) }}đ</p>
    <p><strong>Trạng thái:</strong> {{ $c->status }}</p>

    <hr>

    <p>{{ $c->description }}</p>

  </div>

</div>


  </div>
</div>

<!-- MODAL XÁC NHẬN -->

<div class="modal fade" id="joinModal{{ $c->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">


  <div class="modal-header">
    <h5 class="modal-title">Xác nhận tham gia</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <div class="modal-body">
    Bạn có chắc muốn tham gia khóa học 
    <strong class="text-primary">{{ $c->name }}</strong> không?
  </div>

  <div class="modal-footer">

    <button class="btn btn-secondary" data-bs-dismiss="modal">
        Đóng
    </button>

    <a href="{{ route('courses.lessons', $c->id) }}" 
       class="btn btn-success">
        Xác nhận
    </a>

  </div>

</div>


  </div>
</div>

@endforeach

</div>

<!-- PAGINATION -->

<div class="d-flex justify-content-center mt-4">
    {{ $courses->links('pagination::bootstrap-5') }}
</div>

@endsection
