@extends('layouts.master')

@section('title')
    Thêm mới tài khoản
@endsection

@section('badges')
    @if (!empty($_SESSION['errors']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
            <li class="inline-block bg-red-100 text-red-800 text-sm font-medium mt-4 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                {{ $error }}
            </li>
            @endforeach
        </ul>

        @php
            unset($_SESSION['errors']);
        @endphp
    @endif
@endsection

@section('content')
    <form action="{{ url("admin/categories/store") }}" enctype="multipart/form-data" method="POST" class="container max-w-screen-sm m-auto pt-4">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-base font-bold mb-2">Category name</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="font-semibold w-full px-6 py-2 my-2 text-white border-2 border-cyan-500 bg-cyan-500 hover:bg-white hover:text-cyan-500">
            Create
        </button>
    </form>
@endsection