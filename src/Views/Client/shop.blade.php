@extends('layouts.master')

@section('titlebar')
    FPT Funi − Shop
@endsection

@section('content')
<section class="container max-w-screen-xl m-auto pt-[100px]">
    <div class="grid grid-cols-12 gap-4 p-4">
        <aside class="col-span-3 shadow-md bg-gray-50 h-fit">
            <div class="text-amber-500 bg-white flex items-center justify-center">
                <form action="{{ url('search') }}" method="POST" class="border rounded overflow-hidden flex">
                    <input type="text" name="keyword" class="px-4 py-2 font-medium focus:outline-amber-500" placeholder="Search" required>
                    <button type="submit" class="flex items-center justify-center px-4 border-l">
                        <svg class="h-6 w-6 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                        </svg>
                    </button>
                </form>
            </div>
            <h2 class="font-semibold text-2xl pl-8 py-4 border-b-2 border-gray-200">
                Categories
            </h2>
            <ul class="flex flex-col">
                @foreach ($categories as $category)
                    <a href="{{ url('cate/' . $category['id']) }}" class="font-medium hover:text-amber-500 hover:bg-gray-100 p-3 pl-8">{{ $category['name'] }}</a>
                @endforeach
            </ul>
        </aside>

        <main class="col-span-9">
            <div class="grid grid-cols-3 gap-8">
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

            <div class="flex items-center justify-end space-x-2 font-medium my-8">
                <!-- Previous Page Link -->

                <!-- Page Numbers -->
                <ul class="flex gap-2">
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <a href="?page={{$i}}" class="px-4 py-2 {{ $currentPage == $i ? 'bg-amber-600 text-white' : 'bg-gray-200 text-gray-600' }} font-semibold rounded-lg hover:opacity-75">
                            {{$i}}
                        </a>
                    @endfor
                </ul>

                <!-- Next Page Link -->
            </div>
        </main>
    </div>
</section>
@endsection