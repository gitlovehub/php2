@extends('layouts.master')

@section('title')
    Quản lý tài khoản
@endsection

@section('content')
    <a href="{{ url('admin/users/create') }}" class="inline-block float-end mb-4 px-8 py-3 font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        + Create
    </a>

    <div class="min-h-[500px]">
        <table class="w-full divide-y divide-gray-200 font-medium">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Id</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Avatar</th>
                    <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Name</th>
                    <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Email</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Created at</th>
                    <th class="py-3 text-gray-600 font-semibold uppercase tracking-wider">Update at</th>
                    <th class="py-3 text-gray-600 text-center font-semibold uppercase tracking-wider">Action</th>
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
                        <td class="py-3 whitespace-nowrap text-center">
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
    </div>

    <ul class="pt-5 flex gap-2 justify-end">
        @for ($i = 1; $i <= $totalPages; $i++)
            <a href="?page={{$i}}" class="px-4 py-2 {{ $currentPage == $i ? 'bg-gray-600 text-white' : 'bg-gray-200 text-gray-600' }} font-semibold rounded-lg hover:opacity-75">
                {{$i}}
            </a>
        @endfor
    </ul>
@endsection