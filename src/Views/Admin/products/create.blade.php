@extends('layouts.master')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('badges')
    @if (!empty($_SESSION['errors']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
            <li class="inline-block bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold my-4">
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
    <form action="{{ url("admin/products/store") }}" enctype="multipart/form-data" method="POST" class="container max-w-screen-sm m-auto pt-4">
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-base font-bold mb-2">Category Name</label>
            <select id="category" name="category_id" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
                @foreach ($categoryName as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="thumbnail" class="block text-gray-700 text-base font-bold mb-2">Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" class="px-4 py-2 w-full rounded-md border cursor-pointer">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-base font-bold mb-2">Product name</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-base font-bold mb-2">Price</label>
            <input type="number" id="price" name="price" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500" placeholder="0">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-base font-bold mb-2">Description</label>
            <textarea id="description" name="description" rows="4" cols="50" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500"></textarea>
        </div>
    
        <button type="submit" class="font-semibold w-full px-6 py-2 my-2 text-white border-2 border-cyan-500 bg-cyan-500 hover:bg-white hover:text-cyan-500">
            Create
        </button>
    </form>
@endsection