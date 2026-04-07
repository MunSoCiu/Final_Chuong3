@extends('layouts.master')

@section('content')

<h3>Danh sách học viên</h3>

<table class="table">
<tr>
    <th>Tên</th>
    <th>Email</th>
</tr>

@foreach($enrollments as $e)
<tr>
    <td>{{ $e->student->name }}</td>
    <td>{{ $e->student->email }}</td>
</tr>
@endforeach

</table>

@endsection