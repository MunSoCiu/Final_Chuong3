@extends('layout.master')

@section('content')

<h4 class="mb-4">🔥 Sản phẩm HOT</h4>

@php
    $count = $products->count();
    $max = $products->perPage(); // 🔥 lấy đúng số paginate (không hardcode 8)
@endphp

<div class="row g-4">

    {{-- SẢN PHẨM --}}
    @foreach($products as $p)
        <div class="col-md-3">
            <div class="card product-card h-100 text-center p-2">

                <div style="height:180px; display:flex; align-items:center; justify-content:center;">
                    @if($p->image)
                        <img src="{{ asset('storage/'.$p->image) }}" style="max-height:160px;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </div>

                <div class="mt-2">
                    <h6>{{ $p->name }}</h6>
                    <div class="price">{{ number_format($p->price) }}đ</div>
                    <small>{{ $p->category->name ?? '' }}</small>

                    <button class="btn btn-white w-100 mt-2">🌸🌸🌸</button>
                </div>

            </div>
        </div>
    @endforeach

    {{-- Ô TRỐNG GIỮ LAYOUT --}}
    @for ($i = $count; $i < $max; $i++)
        <div class="col-md-3">
            <div class="card product-card h-100" style="opacity:0;"></div>
        </div>
    @endfor

</div>

{{-- PAGINATION --}}
<div class="pagination-custom mt-4">

    {{-- Prev --}}
    @if ($products->onFirstPage())
        <span class="page-btn">‹</span>
    @else
        <a href="{{ $products->previousPageUrl() }}" class="page-btn">‹</a>
    @endif

    {{-- Page numbers --}}
    @for ($i = 1; $i <= $products->lastPage(); $i++)
        <a href="{{ $products->url($i) }}"
           class="page-btn {{ $i == $products->currentPage() ? 'page-active' : '' }}">
            {{ $i }}
        </a>
    @endfor

    {{-- Next --}}
    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}" class="page-btn">›</a>
    @else
        <span class="page-btn">›</span>
    @endif

</div>

@endsection