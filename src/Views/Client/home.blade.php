@extends('layouts.master')

@section('titlebar')
    FPT Funi − Home
@endsection

@section('content')
<section class="pt-[72px]">
    <img class="w-full h-600 object-center" src="assets/images/home-banner.jpg" alt="">
</section>

<section class="container max-w-screen-xl m-auto pt-16">
    <div class="flex items-center justify-between">
        <h2 class="text-[40px] font-semibold">New Products</h2>
        <a href=""
            class="font-semibold px-4 py-2 text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">View
            all products</a>
    </div>

    <div class="pt-4 grid grid-cols-4 gap-8">
        @foreach ($products as $product)
            <div class="cursor-pointer transition duration-300 border-2 hover:border-2 hover:border-amber-500 hover:shadow-md relative">
                @if ($product['instock'] < 1)
                    <div class="absolute bg-gray-200 opacity-60 w-full h-full flex cursor-not-allowed"></div>
                @endif
                <div onclick="redirectToProductDetail({{$product['id']}})">
                    <div class="h-80 overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset($product['thumbnail']) }}" alt="">
                    </div>
                    <div class="bg-gray-100 px-4">
                        <h4 class="font-semibold text-xl">{{$product['name']}}</h4>
                        <p class="font-medium text-sm text-gray-500 pt-1">Category: {{$product['category_name']}}</p>
                        <h4 class="font-semibold pt-2 text-xl text-red-500">£{{ number_format($product['price'], 2, '.', ',') }}</h4>
                    </div>
                </div>
                <div class="bg-gray-100 p-4">
                    @if ($product['instock'] < 1)
                        <a href="#" class="block py-2 text-center uppercase font-semibold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                            Sold out
                        </a>
                    @else
                        <a href="{{url('cart/add')}}?quantity=1&productID={{$product['id']}}" class="block py-2 text-center uppercase font-semibold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                            Add to cart
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="container max-w-screen-xl m-auto pt-16">
    <div class="flex items-center justify-between">
        <h2 class="text-[40px] font-semibold">Gallery</h2>
        <a href=""
            class="font-semibold px-4 py-2 text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">View
            all gallery</a>
    </div>

    <div class="pt-4 grid grid-cols-3 gap-8">
        <div class="image-wrapper overflow-hidden">
            <img class="w-full h-72 object-cover cursor-pointer transform transition duration-500 hover:scale-110"
                src="assets/images/gallery1.jpg" alt="">
        </div>
        <div class="image-wrapper overflow-hidden">
            <img class="w-full h-72 object-cover cursor-pointer transform transition duration-500 hover:scale-110"
                src="assets/images/gallery2.jpg" alt="">
        </div>
        <div class="image-wrapper overflow-hidden">
            <img class="w-full h-72 object-cover cursor-pointer transform transition duration-500 hover:scale-110"
                src="assets/images/gallery3.jpg" alt="">
        </div>
        <div class="image-wrapper overflow-hidden">
            <img class="w-full h-72 object-cover cursor-pointer transform transition duration-500 hover:scale-110"
                src="assets/images/gallery4.jpg" alt="">
        </div>
        <div class="image-wrapper overflow-hidden">
            <img class="w-full h-72 object-cover cursor-pointer transform transition duration-500 hover:scale-110"
                src="assets/images/gallery5.jpg" alt="">
        </div>
        <div class="image-wrapper overflow-hidden">
            <img class="w-full h-72 object-cover cursor-pointer transform transition duration-500 hover:scale-110"
                src="assets/images/gallery6.jpg" alt="">
        </div>
    </div>
</section>

<section class="container max-w-screen-xl m-auto pt-16">
    <div class="flex items-center justify-between">
        <h2 class="text-[40px] font-semibold">News</h2>
        <a href=""
            class="font-semibold px-4 py-2 text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">View
            all news</a>
    </div>

    <div class="pt-4 grid grid-cols-4 gap-8">
        <div>
            <div class="h-52 overflow-hidden">
                <img class="w-full h-full object-cover" src="assets/images/news1.jpg" alt="">
            </div>
            <p class="text-gray-400 font-semibold text-sm flex items-center gap-1 pt-4">
                <span class="material-symbols-outlined">calendar_month</span>
                24/4/2024
            </p>
            <h4 class="font-semibold text-xl pt-1">A bedroom must have something like this</h4>
            <a href="" class="text-red-500 flex items-center gap-1 font-semibold pt-3">
                Xem chi tiết
                <span class="material-symbols-outlined font-semibold">east</span>
            </a>
        </div>
        <div>
            <div class="h-52 overflow-hidden">
                <img class="w-full h-full object-cover" src="assets/images/news2.jpg" alt="">
            </div>
            <p class="text-gray-400 font-semibold text-sm flex items-center gap-1 pt-4">
                <span class="material-symbols-outlined">calendar_month</span>
                24/4/2024
            </p>
            <h4 class="font-semibold text-xl pt-1">A bedroom must have something like this</h4>
            <a href="" class="text-red-500 flex items-center gap-1 font-semibold pt-3">
                Xem chi tiết
                <span class="material-symbols-outlined font-semibold">east</span>
            </a>
        </div>
        <div>
            <div class="h-52 overflow-hidden">
                <img class="w-full h-full object-cover" src="assets/images/news3.jpg" alt="">
            </div>
            <p class="text-gray-400 font-semibold text-sm flex items-center gap-1 pt-4">
                <span class="material-symbols-outlined">calendar_month</span>
                24/4/2024
            </p>
            <h4 class="font-semibold text-xl pt-1">A bedroom must have something like this</h4>
            <a href="" class="text-red-500 flex items-center gap-1 font-semibold pt-3">
                Xem chi tiết
                <span class="material-symbols-outlined font-semibold">east</span>
            </a>
        </div>
        <div>
            <div class="h-52 overflow-hidden">
                <img class="w-full h-full object-cover" src="assets/images/news4.jpg" alt="">
            </div>
            <p class="text-gray-400 font-semibold text-sm flex items-center gap-1 pt-4">
                <span class="material-symbols-outlined">calendar_month</span>
                24/4/2024
            </p>
            <h4 class="font-semibold text-xl pt-1">A bedroom must have something like this</h4>
            <a href="" class="text-red-500 flex items-center gap-1 font-semibold pt-3">
                Xem chi tiết
                <span class="material-symbols-outlined font-semibold">east</span>
            </a>
        </div>
    </div>
</section>

<section class="bg-orange-50 mt-16">
    <div class="container max-w-screen-xl m-auto">
        <div class="grid grid-cols-4 justify-items-center py-16">
            <div>
                <div class="flex items-center gap-5">
                    <span class="material-symbols-outlined text-5xl">emoji_events</span>
                    <div>
                        <h4 class="font-semibold text-xl">High Quality</h4>
                        <p class="text-gray-400 pt-1 font-medium">Crafted from top materials</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center gap-5">
                    <span class="material-symbols-outlined text-5xl">support_agent</span>
                    <div>
                        <h4 class="font-semibold text-xl">24/7 Support</h4>
                        <p class="text-gray-400 pt-1 font-medium">Dedicated support</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center gap-5">
                    <span class="material-symbols-outlined text-5xl">award_star</span>
                    <div>
                        <h4 class="font-semibold text-xl">Warranty Protection</h4>
                        <p class="text-gray-400 pt-1 font-medium">Over 2 years</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center gap-5">
                    <span class="material-symbols-outlined text-5xl">local_shipping</span>
                    <div>
                        <h4 class="font-semibold text-xl">Free Shipping</h4>
                        <p class="text-gray-400 pt-1 font-medium">Order over 150£</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection