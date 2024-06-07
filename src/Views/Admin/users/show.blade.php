@extends('layouts.master');

@section('title')
    Thông Tin Người Dùng
@endsection

@section('content')
<h2>Chi tiết người dùng: {{ $user['name'] }}</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>TRƯỜNG</th>
            <th>GIÁ TRỊ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection