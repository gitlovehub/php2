@extends('layouts.master')

@section('content')
<section class="pt-[72px]">
    <img class="w-full h-600 object-center" src="assets/images/shop-banner.jpg" alt="">
</section>

<section class="container max-w-screen-xl m-auto pt-16">
    <div class="grid grid-cols-12 gap-4 p-4">
        <aside class="col-span-3 shadow-md bg-gray-50 pb-4 h-fit">
            <h2 class="font-semibold text-2xl ps-4 py-4 border-b-2 border-gray-200">
                Categories
            </h2>
            <ul class="flex flex-col gap-2">
                @foreach ($categories as $category)
                    <a href="" class="font-medium hover:text-amber-500 hover:bg-gray-100 p-2 ps-4">{{ $category['name'] }}</a>
                @endforeach
            </ul>
        </aside>

        <main class="col-span-9">
            <div class="grid grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div class="cursor-pointer transition duration-300 border-2 hover:border-2 hover:border-amber-500 hover:shadow-md">
                        <div class="h-80 overflow-hidden">
                            <img class="w-full h-full object-cover" src="{{ asset($product['thumbnail']) }}" alt="">
                        </div>
                        <div class="bg-gray-100 p-4">
                            <h4 class="font-semibold text-xl">{{$product['name']}}</h4>
                            <p class="font-medium text-sm text-gray-400 pt-1">Category: {{$product['category_id']}}</p>
                            <h4 class="font-semibold pt-2 text-xl text-red-500">£{{ number_format($product['price'], 2, '.', ',') }}</h4>
                            <button
                                class="mt-3 py-2 w-full uppercase font-semibold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">Add
                                to cart</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex items-center space-x-2 font-medium my-8">
                <!-- Previous Page Link -->
                <!-- <a href="#" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 flex items-center">
                    Previous
                </a> -->
                
                <!-- Page Numbers -->
                <a href="#" class="px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600">1</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300">2</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300">3</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300">4</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300">5</a>

                <!-- Next Page Link -->
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 flex items-center">
                    Next
                </a>
            </div>
        </main>
    </div>
</section>
@endsection