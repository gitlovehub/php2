@extends('layouts.master')

@section('title')
    Quản lý danh mục
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
    <a href="{{ url('admin/categories/create') }}" class="font-semibold block w-fit float-right px-6 py-1 my-2 text-cyan-500 border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white">
        Create
    </a>

    <table class="w-full divide-y divide-gray-200 font-medium">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Id</th>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Name</th>
                <th class="py-3 text-gray-600 text-center font-semibold uppercase tracking-wider">Created at</th>
                <th class="py-3 text-gray-600 text-center font-semibold uppercase tracking-wider">Update at</th>
                <th class="py-3 text-gray-600 text-end font-semibold uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($list as $category)
                <tr>
                    <td class="py-3 whitespace-nowrap">{{$category['id']}}</td>
                    <td class="py-3 whitespace-nowrap">{{$category['name']}}</td>
                    <td class="py-3 whitespace-nowrap text-center">{{$category['created_at']}}</td>
                    <td class="py-3 whitespace-nowrap text-center">{{$category['updated_at']}}</td>
                    <td class="py-3 whitespace-nowrap text-end">
                        <a href="{{ url("admin/categories/{$category['id']}/edit") }}" class="text-amber-500 me-2">Sửa</a>
                        <a href="{{ url("admin/categories/{$category['id']}/delete" ) }}"
                            onclick="return confirm('Are you sure?')"
                            class="text-red-500">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection