@extends('layout.admin')

@section('content')

<a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">
    ⬅️ Quay lại
</a>
<h3>Sửa sản phẩm</h3>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<input name="name" value="{{ $product->name }}" class="form-control mb-2">
<input name="price" value="{{ $product->price }}" class="form-control mb-2">
<input name="quantity" value="{{ $product->quantity }}" class="form-control mb-2">

<select name="category_id" class="form-control mb-2">
    @foreach($categories as $c)
        <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>
            {{ $c->name }}
        </option>
    @endforeach
</select>

<input type="file" name="image" class="form-control mb-2">



<button class="btn btn-primary">Cập nhật</button>

</form>

@endsection