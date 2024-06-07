@extends('layouts.master');

@section('title')
    Quản Lý Người Dùng    
@endsection

@section('content')
    @if (isset($_SESSION["alert"]) && $_SESSION["alert"])
        <div class="alert alert-success">
            {{ $_SESSION["msg"] }}
        </div>
        @php
            unset($_SESSION["alert"]);
            unset($_SESSION["msg"]);
        @endphp
    @endif
    
    @if (isset($_SESSION['alert']) && !$_SESSION['alert'])
        <div class="alert alert-warning">
            {{ $_SESSION['msg'] }}
        </div>
        @php
            unset($_SESSION['alert']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>AVATAR</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['avatar']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['created_at']}}</td>
                    <td>{{$user['updated_at']}}</td>
                    <td>
                        <a href="{{ url("admin/users/{$user['id']}/show") }}" class="btn btn-info">Xem</a>
                        <a href="{{ url("admin/users/{$user['id']}/delete" ) }}"
                            onclick="return confirm('Are you sure?')"
                            class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection