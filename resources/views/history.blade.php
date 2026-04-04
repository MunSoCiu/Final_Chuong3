@extends('layout.admin')

@section('content')

<h4>🕒 Lịch sử sản phẩm</h4>

<table class="table">
<tr>
<th>Tên</th>
<th>Ngày tạo</th>
<th>Cập nhật</th>
</tr>

@foreach($products as $p)
<tr>
<td>{{ $p->name }}</td>
<td>{{ optional($p->created_at)->format('d/m/Y H:i') }}</td>
<td>{{ optional($p->updated_at)->format('d/m/Y H:i') }}</td>
</tr>
@endforeach

</table>

{{ $products->links() }}

@endsection