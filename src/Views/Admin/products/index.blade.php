@extends('layouts.master')

@section('title')
    Quản lý sản phẩm
@endsection

@section('content')
    <a href="{{ url('admin/products/create') }}" class="inline-block float-end mb-4 px-8 py-3 font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        + Create
    </a>

    <div class="min-h-[555px]">
        <table class="w-full divide-y divide-gray-200 font-medium">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Id</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Category</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Thumbnail</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Name</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Price</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Instock</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($list as $product)
                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                        <td class="py-3 whitespace-nowrap">{{$product['id']}}</td>
                        <td class="py-3 whitespace-nowrap">
                            {{$product['category_name']}}
                        </td>
                        <td class="py-3 whitespace-nowrap grid place-items-center">
                            <div class="w-16 h-16 rounded overflow-hidden border shadow-md">
                                <img src="{{ asset($product['thumbnail']) }}" alt="" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-3 whitespace-nowrap">{{$product['name']}}</td>
                        <td class="py-3 whitespace-nowrap">{{$product['price']}}</td>
                        <td class="py-3 whitespace-nowrap">{{$product['instock']}}</td>
                        <td class="py-3 whitespace-nowrap">
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
    </div>

    <ul class="pt-5 flex gap-2 justify-end">
        @for ($i = 1; $i <= $totalPages; $i++)
            <a href="?page={{$i}}" class="px-4 py-2 {{ $currentPage == $i ? 'bg-gray-600 text-white' : 'bg-gray-200 text-gray-600' }} font-semibold rounded-lg hover:opacity-75">
                {{$i}}
            </a>
        @endfor
    </ul>
@endsection