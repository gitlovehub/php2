@extends('layouts.master')

@section('title')
    Cập nhật tài khoản
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
    <form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data" method="POST" class="container max-w-screen-sm m-auto pt-4">
        <div class="grid place-items-center">
            <div class="w-24 h-24 rounded-full overflow-hidden drop-shadow-md">
                <img src="{{ $user['avatar'] != null ? asset($user['avatar']) : asset('assets/admin/images/avatar.png')}}" alt="" class="w-full h-full object-cover">
            </div>
            <input type="file" id="avatar" name="avatar" class="cursor-pointer hidden">
            <label for="avatar" class="cursor-pointer font-semibold block w-fit float-right px-6 py-1 mt-2 text-cyan-500 border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white">Upload new avatar</label>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-base font-bold mb-2">Full name</label>
            <input type="text" id="name" name="name" value="{{ $user['name'] }}" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-base font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ $user['email'] }}" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <div class="grid grid-cols-12">
                <div class="col-span-6">
                    <label for="role_admin" class="inline-flex items-center">
                      <input type="radio" id="role_admin" value="admin" @if ($user['role'] == 'admin') checked @endif class="form-radio text-blue-500" name="role">
                      <span class="ml-2 text-base font-bold">Admin</span>
                    </label>
                </div>
                <div class="col-span-6">
                    <label for="role_member" class="inline-flex items-center">
                        <input type="radio" id="role_member" value="member" @if ($user['role'] == 'member') checked @endif class="form-radio text-blue-500" name="role">
                        <span class="ml-2 text-base font-bold">Member</span>
                    </label>
                </div>
            </div>
        </div>
    
        <button type="submit" class="font-semibold w-full px-6 py-2 my-2 text-white border-2 border-green-500 bg-green-500 hover:bg-white hover:text-green-500">
            Update
        </button>
    </form>
@endsection