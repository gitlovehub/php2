@extends('layouts.master')

@section('title')
    Quản lý tài khoản
@endsection

@section('badges')
    @if (isset($_SESSION["alert"]) && $_SESSION["alert"])
        <span class="inline-block bg-green-500 text-white px-4 py-1 rounded-full text-sm font-semibold my-4">
            {{ $_SESSION["msg"] }}
        </span>
        @php
            unset($_SESSION["alert"]);
            unset($_SESSION["msg"]);
        @endphp
    @endif

    @if (isset($_SESSION["alert"]) && !$_SESSION["alert"])
        <span class="inline-block bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold my-4">
            {{ $_SESSION["msg"] }}
        </span>
        @php
            unset($_SESSION["alert"]);
            unset($_SESSION["msg"]);
        @endphp
    @endif
@endsection

@section('content')
    <a href="{{ url('admin/users/create') }}" class="font-semibold block w-fit float-right px-6 py-1 my-2 text-cyan-500 border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white">
        Create
    </a>

    <table class="w-full divide-y divide-gray-200 font-medium">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Id</th>
                <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Avatar</th>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Name</th>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Email</th>
                <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Created at</th>
                <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Update at</th>
                <th class="py-3 text-gray-600 text-end font-semibold uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($list as $user)
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                    <td class="py-3 whitespace-nowrap">{{$user['id']}}</td>
                    <td class="py-3 whitespace-nowrap grid place-items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden drop-shadow-md">
                            <img src="{{ $user['avatar'] != null ? asset($user['avatar']) : asset('assets/admin/images/avatar.png')}}" alt="" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="py-3 whitespace-nowrap">{{$user['name']}}</td>
                    <td class="py-3 whitespace-nowrap">{{$user['email']}}</td>
                    <td class="py-3 whitespace-nowrap text-center">{{$user['created_at']}}</td>
                    <td class="py-3 whitespace-nowrap text-center">{{$user['updated_at']}}</td>
                    <td class="py-3 whitespace-nowrap text-end">
                        <a href="{{ url("admin/users/{$user['id']}/show") }}" class="text-green-500 me-2">Xem</a>
                        <a href="{{ url("admin/users/{$user['id']}/edit") }}" class="text-amber-500 me-2">Sửa</a>
                        <a href="{{ url("admin/users/{$user['id']}/delete" ) }}"
                            onclick="return confirm('Are you sure?')"
                            class="text-red-500">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10">
        @for ($i = 1; $i <= $totalPages; $i++)
            <a href="?page={{$i}}" class="me-2 px-4 py-2 bg-gray-200 font-semibold text-gray-600 rounded-lg hover:bg-gray-300">{{$i}}</a>
        @endfor
    </div>
@endsection