@extends('layouts.master')

@section('titlebar')
    FPT Funi − Account
@endsection

@section('content')
<section class="pt-[72px]">
    <main class="mt-12 text-gray-800 tracking-wider max-w-screen-xl m-auto flex justify-center min-h-screen">
        <nav class="w-56 flex-none text-gray-800 tracking-wider border-r">
            <div class="h-full flex flex-col gap-2 p-2">
                <div class="py-2 flex flex-col gap-1">
                    <a class="flex items-center text-sm rounded tracking-wider bg-amber-200 px-4 py-2 cursor-pointer hover:bg-amber-100 transition duration-200 ease-in-out">
                        <p>Distribution</p>
                    </a>
                    <a class="flex items-center text-sm rounded tracking-wider px-4 py-2 cursor-pointer hover:bg-amber-100 transition duration-200 ease-in-out">
                        <p>Event</p>
                    </a>
                    <a class="flex items-center text-sm rounded tracking-wider px-4 py-2 cursor-pointer hover:bg-amber-100 transition duration-200 ease-in-out">
                        <p>Gallery</p>
                    </a>
                    <a href="{{url('auth/logout')}}" class="flex items-center text-sm rounded tracking-wider px-4 py-2 cursor-pointer hover:bg-red-100 hover:text-red-500 font-medium transition duration-200 ease-in-out">
                        <p>Log out</p>
                    </a>
                </div>
            </div>
        </nav>
        <div class="p-4">
            <form action="" method="POST">
                <div class="grid grid-cols-2 gap-8">
                    <div class="">
                        <!-- PERSONAL -->
                        <div class="flex flex-col gap-2" x-show="tab==='account'">
                            <h1 class="font-bold text-2xl">Personal</h1>
                            <hr class="my-2">
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-xs">First Name</label>
                                <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-xs">Last Name</label>
                                <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-xs">Email Address <span class="text-gray-400" style="font-size:10px">(This email will be use for login)</span></label>
                                <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-blue-500 hover:bg-blue-600 transition duration-200 ease-in-out rounded text-xs px-3 py-2 tracking-wider text-white font-semibold focus:outline-none">Save</button>
                            </div>
                        </div>
                        <!-- PASSWORD -->
                        <div class="flex flex-col gap-2" x-show="tab==='security'">
                            <h1 class="font-bold text-2xl">Credential</h1>
                            <hr class="my-2">
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-xs">Current Password</label>
                                <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-xs">New Password</label>
                                <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-xs">Confirm New Password</label>
                                <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-blue-500 hover:bg-blue-600 transition duration-200 ease-in-out rounded text-xs px-3 py-2 tracking-wider text-white font-semibold focus:outline-none">Save</button>
                            </div>
                        </div>
                    </div>
                    <!-- ADDRESS -->
                    <div class="flex flex-col gap-2" x-show="tab==='account'">
                        <h1 class="font-bold text-2xl">Address</h1>
                        <hr class="my-2">
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">Address 1</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">Address 2</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">Address 3</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">Postcode</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">City</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">State</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold text-xs">Country</label>
                            <input type="text" class="appearance-none px-4 py-2 text-xs tracking-wider border border-gray-200 rounded focus:outline-none focus:ring-4 focus:ring-gray-200 focus:border-transparent bg-white transition duration-200 ease-in-out">
                        </div>
                        <div class="flex justify-end">
                            <button class="bg-blue-500 hover:bg-blue-600 transition duration-200 ease-in-out rounded text-xs px-3 py-2 tracking-wider text-white font-semibold focus:outline-none">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</section>
@endsection