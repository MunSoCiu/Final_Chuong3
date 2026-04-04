@extends('layout.admin')

@section('content')
<a href="{{ route('products.index') }}" class="btn btn-primary mb-3">
    ⬅️ Quay lại Sản Phẩm
</a>
<h3>Thêm sản phẩm</h3>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input name="name" class="form-control mb-2" placeholder="Tên">
<input name="price" class="form-control mb-2" placeholder="Giá">
<input name="quantity" class="form-control mb-2" placeholder="Số lượng">

<select name="category_id" class="form-control mb-2">
    @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
    @endforeach
</select>

<input type="file" name="image" class="form-control mb-2">

<button class="btn btn-success">Lưu</button>

</form>

@endsection