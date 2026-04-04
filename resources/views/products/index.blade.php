@extends('layout.admin')

@section('content')

<h3>Danh sách sản phẩm</h3>

<a href="{{ route('products.create') }}" class="btn btn-success mb-3">+ Thêm</a>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Giá</th>
    <th>Danh mục</th>
    <th>Ảnh</th>
    <th>Action</th>
</tr>

@foreach($products as $p)
<tr>
    <td>{{ $p->name }}</td>
    <td>{{ $p->price }}</td>
    <td>{{ $p->category->name }}</td>
    <td>
        @if($p->image)
            <img src="{{ asset('storage/'.$p->image) }}" width="60">
        @endif
    </td>
    <td>
        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Sửa</a>

        <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
@endforeach

</table>


@endsection