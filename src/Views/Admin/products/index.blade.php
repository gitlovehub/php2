@extends('layouts.master')

@section('title')
    Quản lý sản phẩm
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
    <a href="{{ url('admin/products/create') }}" class="font-semibold block w-fit float-right px-6 py-1 my-2 text-cyan-500 border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white">
        Create
    </a>

    <table class="w-full divide-y divide-gray-200 font-medium">
        <thead class="bg-gray-100">
            <tr>
                <th class="w-1/6 py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Id</th>
                <th class="w-1/6 py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Category</th>
                <th class="w-1/6 py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Thumbnail</th>
                <th class="w-1/6 py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Name</th>
                <th class="w-1/6 py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Price</th>
                <th class="w-1/6 py-3 text-gray-600 text-end font-semibold uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($list as $product)
                <tr>
                    <td class="w-1/6 py-3 whitespace-nowrap">{{$product['id']}}</td>
                    <td class="w-1/6 py-3 whitespace-nowrap">
                        {{$product['category_id']}}
                    </td>
                    <td class="w-1/6 py-3 whitespace-nowrap">
                        <div class="w-16 h-16 rounded overflow-hidden border shadow-md">
                            <img src="{{ asset($product['thumbnail']) }}" alt="" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="w-1/6 py-3 whitespace-nowrap">{{$product['name']}}</td>
                    <td class="w-1/6 py-3 whitespace-nowrap">{{$product['price']}}</td>
                    <td class="w-1/6 py-3 whitespace-nowrap text-end">
                        <a href="{{ url("admin/products/{$product['id']}/show") }}" class="text-green-500 me-2">Xem</a>
                        <a href="{{ url("admin/products/{$product['id']}/edit") }}" class="text-amber-500 me-2">Sửa</a>
                        <a href="{{ url("admin/products/{$product['id']}/delete" ) }}"
                            onclick="return confirm('Are you sure?')"
                            class="text-red-500">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection