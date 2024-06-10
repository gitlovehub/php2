@extends('layouts.master')

@section('titlebar')
    FPT Funi − Login
@endsection

@section('content')
<section style="min-height: 90vh;" class="pt-[72px]">
    <h2 class="text-[40px] text-center font-semibold pt-10">Login</h2>

    <p class="text-center">
        @if (!empty($_SESSION['msg']))
            <span class="inline-block bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold my-4">
                {{ $_SESSION["msg"] }}
            </span>
    
            @php
                unset($_SESSION['msg']);
            @endphp
        @endif
    </p>

    <main class="container max-w-screen-400 m-auto">
        <form action="{{ url('auth/handle-login') }}" method="POST">
            <div class="mt-2">
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div class="mt-2">
                <label for="password" class="block font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div class="mt-2 text-end">
                <a href="" class="hover:underline">Forgot password?</a>
            </div>

            <button type="submit" class="mt-6 py-2 w-full text-center text-xl uppercase tracking-widest rounded font-semibold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                Login
            </button>
        </form>

        <p class="text-center mt-2">Don't have an account?
            <a href="register.html" class="text-red-500 font-medium hover:underline">Create one</a>
        </p>
    </main>
</section>
@endsection