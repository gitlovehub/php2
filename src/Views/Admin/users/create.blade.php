@extends('layouts.master')

@section('title')
    Thêm mới tài khoản
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
    <form action="{{ url("admin/users/store") }}" enctype="multipart/form-data" method="POST" class="container max-w-screen-sm m-auto pt-4">
        <div class="mb-4">
            <label for="avatar" class="block text-gray-700 text-base font-bold mb-2">Avatar</label>
            <input type="file" id="avatar" name="avatar" class="px-4 py-2 w-full rounded-md border cursor-pointer">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-base font-bold mb-2">Full name</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-base font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-base font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="confirm" class="block text-gray-700 text-base font-bold mb-2">Confirm password</label>
            <input type="password" id="confirm" name="confirm" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <div class="grid grid-cols-12">
                <div class="col-span-6">
                    <label for="role_admin" class="inline-flex items-center">
                      <input type="radio" id="role_admin" value="admin" class="form-radio text-blue-500" name="role">
                      <span class="ml-2 text-base font-bold">Admin</span>
                    </label>
                </div>
                <div class="col-span-6">
                    <label for="role_member" class="inline-flex items-center">
                        <input type="radio" id="role_member" value="member" checked class="form-radio text-blue-500" name="role">
                        <span class="ml-2 text-base font-bold">Member</span>
                    </label>
                </div>
            </div>
        </div>
    
        <button type="submit" class="font-semibold w-full px-6 py-2 my-2 text-white border-2 border-cyan-500 bg-cyan-500 hover:bg-white hover:text-cyan-500">
            Create
        </button>
    </form>
@endsection