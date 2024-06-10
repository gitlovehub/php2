@extends('layouts.master')

@section('title')
    Quản lý danh mục
@endsection

@section('content')
    <a href="{{ url('admin/categories/create') }}" class="inline-block float-end mb-4 px-8 py-3 font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        + Create
    </a>

    <div class="min-h-[500px]">
        <table class="w-full divide-y divide-gray-200 font-medium">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Id</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Name</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Created at</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Update at</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($list as $category)
                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                        <td class="py-3 whitespace-nowrap">{{$category['id']}}</td>
                        <td class="py-3 whitespace-nowrap">{{$category['name']}}</td>
                        <td class="py-3 whitespace-nowrap">{{$category['created_at']}}</td>
                        <td class="py-3 whitespace-nowrap">{{$category['updated_at']}}</td>
                        <td class="py-3 whitespace-nowrap">
                            <a href="{{ url("admin/categories/{$category['id']}/edit") }}" class="text-amber-500 me-2">Sửa</a>
                            <a href="{{ url("admin/categories/{$category['id']}/delete" ) }}"
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