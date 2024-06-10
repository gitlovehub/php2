@extends('layouts.master')

@section('titlebar')
    FPT Funi − Product Details
@endsection

@section('content')
<section class="pt-[72px]">
    <div class="max-w-screen-xl m-auto grid grid-cols-2 gap-8 pt-10">
        <aside class="grid grid-cols-12 gap-4">
            <ul class="col-span-2 flex flex-col gap-4 me-2">
                <div class="max-h-20"><img class="w-full h-full object-cover cursor-pointer hover:opacity-75" src="{{ asset($product['thumbnail']) }}" alt=""></div>
                <div class="max-h-20"><img class="w-full h-full object-cover cursor-pointer hover:opacity-75" src="{{ asset($product['thumbnail']) }}" alt=""></div>
                <div class="max-h-20"><img class="w-full h-full object-cover cursor-pointer hover:opacity-75" src="{{ asset($product['thumbnail']) }}" alt=""></div>
                <div class="max-h-20"><img class="w-full h-full object-cover cursor-pointer hover:opacity-75" src="{{ asset($product['thumbnail']) }}" alt=""></div>
                <div class="max-h-20"><img class="w-full h-full object-cover cursor-pointer hover:opacity-75" src="{{ asset($product['thumbnail']) }}" alt=""></div>
            </ul>
            <div class="col-span-10 max-h-500 ms-2">
                <img class="w-full h-full object-cover" src="{{ asset($product['thumbnail']) }}" alt="">
            </div>
        </aside>

        <main>
            <h1 class="font-semibold text-2xl">{{ $product['name'] }}</h1>
            <h2 class="font-bold text-4xl pt-2 text-red-500 price" data-price="{{ $product['price'] }}">£{{ $product['price'] }}</h2>
            <div class="flex items-center gap-4 pt-4">
                <ul class="flex gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc800" class="bi bi-star-fill" viewBox="0 0 16 16"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc800" class="bi bi-star-fill" viewBox="0 0 16 16"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc800" class="bi bi-star-fill" viewBox="0 0 16 16"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc800" class="bi bi-star-fill" viewBox="0 0 16 16"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc800" class="bi bi-star-fill" viewBox="0 0 16 16"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                </ul>
                <span class="text-gray-400 font-medium border-l-2 border-gray-400 ps-4">5 Customer Review</span>
            </div>
            <p class="pt-4 font-medium">{{ $product['description'] }}</p>
            <div class="font-medium">
                <p class="pt-4 mb-2 text-lg text-gray-500">Size</p>
                <ul class="flex gap-4">
                    <button class="w-12 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600">M</button>
                    <button class="w-12 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300">L</button>
                    <button class="w-12 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300">XL</button>
                </ul>
            </div>
            <div>
                <p class="pt-4 mb-2 text-lg text-gray-500 font-medium">Color</p>
                <ul class="flex gap-4">
                    <button class="w-10 h-10 rounded-full bg-pink-500 text-white hover:bg-opacity-75"></button>
                    <button class="w-10 h-10 rounded-full bg-green-500 text-gray-600 hover:bg-opacity-75"></button>
                    <button class="w-10 h-10 rounded-full bg-blue-500 text-gray-600 hover:bg-opacity-75"></button>
                </ul>
            </div>
            <div class="pt-8 flex items-center gap-3">
                <div class="flex items-center border-2 rounded quantity-controls">
                    <button class="px-4 py-2 bg-gray-50 text-2xl font-bold hover:bg-gray-200 decrease-btn" onclick="changeQuantity(-1)">−</button>
                    <span class="px-4 text-xl font-semibold quantity">1</span>
                    <button class="px-4 py-2 bg-gray-50 text-2xl font-bold hover:bg-gray-200 increase-btn" onclick="changeQuantity(1)">+</button>
                </div>
                <form action="{{url('cart/add')}}" method="GET" class="w-full">
                    <input type="hidden" name="productID" value="{{$product['id']}}">
                    <input type="hidden" name="qty" value="1" class="quantityInput">
                    <button type="submit" class="py-3 w-full uppercase rounded font-bold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                        Add to cart
                    </button>
                </form>
                <button class="py-3 w-full uppercase rounded font-bold text-red-500 border-2 border-red-500 hover:bg-red-500 hover:text-white">
                    Buy now
                </button>
            </div>
            <div class="mt-8 border-t-2 border-gray-300 text-gray-500 font-medium leading-8">
                <p class="pt-2">ID: {{$product['id']}}</p>
                <p>Category: {{$product['category_name']}}</p>
            </div>
        </main>
    </div>
</section>

<section class="container max-w-screen-xl m-auto py-16">
    <h2 class="text-[40px] font-semibold text-center">Related Products</h2>
    <div id="slider" class="pt-4 flex gap-8 overflow-x-auto smooth-scroll whitespace-no-wrap snap-x-mandatory">
        @foreach ($relatedProducts as $product)
            <div class="min-w-80 cursor-pointer transition duration-300 border-2 hover:border-2 hover:border-amber-500 hover:shadow-md relative">
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

<script>
    function changeQuantity(value) {
        const quantityDisplay = document.querySelector('.quantity');
        const quantityInput = document.querySelector('.quantityInput');
        let quantity = parseInt(quantityDisplay.textContent);
        quantity += value;
        if (quantity > 0) {
            quantityDisplay.textContent = quantity;
            quantityInput.value = quantity;
            updatePrice();
        }
    }

    function updatePrice() {
        const quantity = parseInt(document.querySelector('.quantity').textContent);
        const price = parseFloat(document.querySelector('.price').dataset.price);
        const totalPrice = quantity * price;
        document.querySelector('.price').textContent = '£' + totalPrice.toFixed(0);
    }
</script>
@endsection