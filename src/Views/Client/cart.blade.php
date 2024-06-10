@extends('layouts.master')

@section('titlebar')
    FPT Funi − Cart
@endsection

@section('content')
<section style="min-height: 90vh;" class="pt-[72px]">
    <h2 class="text-[40px] text-center font-semibold py-10">Cart</h2>
    
    @if (!empty($_SESSION['cart']))
        <main class="max-w-screen-xl m-auto grid grid-cols-12 gap-8 pb-16">
            <div class="col-span-8">
                <table class="w-full divide-y divide-gray-200 font-medium">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 ps-3 text-gray-600 text-left font-semibold tracking-wider">Product</th>
                            <th class="py-3 text-gray-600 text-left font-semibold tracking-wider">Price</th>
                            <th class="py-3 text-gray-600 text-center font-semibold tracking-wider">Quantity</th>
                            <th class="py-3 text-gray-600 text-center font-semibold tracking-wider">Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $total = 0;
                            $sessionCarts = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                        @endphp
                        @foreach ($sessionCarts as $item)
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg cursor-pointer">
                                <td onclick="redirectToProductDetail({{$item['id']}})" class="py-2 whitespace-nowrap">
                                    <div class="ml-2 flex items-center gap-3">
                                        <div class="w-20 h-16 rounded-md border shadow overflow-hidden">
                                            <img class="w-full h-full object-cover" src="{{asset($item['thumbnail'])}}" alt="">
                                        </div>
                                        <span>{{$item['name']}}</span>
                                    </div>
                                </td>
                                <td class="py-2 whitespace-nowrap">
                                    {{$item['price']}}
                                    <input type="hidden" class="price" value="{{$item['price']}}">
                                </td>
                                <td class="py-2 whitespace-nowrap">
                                    <form action="" method="GET" class="flex items-center justify-center mx-auto w-fit border-2 rounded quantity-controls">
                                        <button class="btn-minus px-2.5 py-1 text-2xl font-bold hover:bg-gray-200 decrease-btn">−</button>
                                        <input type="number" name="qty" min="1" value="{{$item['quantity']}}" class="qty-number outline-0 border-0 text-right w-10 bg-transparent" readonly>
                                        <button class="btn-plus px-2.5 py-1 text-2xl font-bold hover:bg-gray-200 increase-btn">+</button>
                                    </form>
                                </td>
                                <td class="py-2 whitespace-nowrap text-center">
                                    @php
                                        $subtotal = $item['quantity'] * $item['price'];
                                        $total += $subtotal;
                                    @endphp
                                    <span class="subtotal">{{$subtotal}}</span>
                                </td>
                                <td class="py-2 whitespace-nowrap text-end">
                                    @php
                                        $url = url('cart/delete') . '?productID=' . $item['id'];
                                    @endphp
                                    <a onclick="return confirm('Are you sure?')" href="{{ $url }}">
                                        <span class="material-symbols-outlined mr-2 text-gray-400 hover:text-red-500 cursor-pointer">delete</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            <aside class="col-span-4 h-fit pb-8 bg-gray-100 px-6">
                <h3 class="font-semibold text-xl text-center uppercase p-6 border-b-2 border-gray-300">Order Summary</h3>
                <div class="flex justify-between items-center pt-4">
                    <p class="font-semibold text-lg">Discounts</p>
                    <p class="font-semibold text-lg text-gray-400">0.00</p>
                </div>
                <div class="flex justify-between items-center pt-4">
                    <p class="font-semibold text-lg">Subtotal</p>
                    <p class="font-semibold text-lg text-red-500">{{number_format($total, 2, '.', ',')}}</p>
                </div>
                <a href="payment.html" class="mt-8 py-2 block text-center uppercase rounded font-bold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                    Check out
                </a>
            </aside>
        </main>
    @else

        @if (!empty($carts))
            <main class="max-w-screen-xl m-auto grid grid-cols-12 gap-8 pb-16">
                <div class="col-span-8">
                    <table class="w-full divide-y divide-gray-200 font-medium">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 ps-3 text-gray-600 text-left font-semibold tracking-wider">Product</th>
                                <th class="py-3 text-gray-600 text-left font-semibold tracking-wider">Price</th>
                                <th class="py-3 text-gray-600 text-center font-semibold tracking-wider">Quantity</th>
                                <th class="py-3 text-gray-600 text-center font-semibold tracking-wider">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php $total = 0; @endphp
                            @foreach ($carts as $item)
                                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg cursor-pointer">
                                    <td onclick="redirectToProductDetail({{$item['product_id']}})" class="py-2 whitespace-nowrap">
                                        <div class="ml-2 flex items-center gap-3">
                                            <div class="w-20 h-16 rounded-md border shadow overflow-hidden">
                                                <img class="w-full h-full object-cover" src="{{asset($item['thumbnail'])}}" alt="">
                                            </div>
                                            <span>{{$item['name']}}</span>
                                        </div>
                                    </td>
                                    <td class="py-2 whitespace-nowrap">
                                        {{$item['price']}}
                                        <input type="hidden" class="price" value="{{$item['price']}}">
                                    </td>
                                    <td class="py-2 whitespace-nowrap">
                                        <div class="flex items-center justify-center mx-auto w-fit border-2 rounded quantity-controls">
                                            <button type="button" class="btn-minus px-2.5 py-1 text-2xl font-bold hover:bg-gray-200 decrease-btn">−</button>
                                            <input type="number" name="qty" min="1" value="{{$item['quantity']}}" class="qty-number outline-0 border-0 text-right w-10 bg-transparent" readonly>
                                            <button type="button" class="btn-plus px-2.5 py-1 text-2xl font-bold hover:bg-gray-200 increase-btn">+</button>
                                            <input type="hidden" name="productID" value="{{$item['product_id']}}">
                                        </div>
                                    </td>
                                    <td class="py-2 whitespace-nowrap text-center">
                                        @php
                                            $subtotal = $item['quantity'] * $item['price'];
                                            $total += $subtotal;
                                        @endphp
                                        <span class="subtotal">{{$subtotal}}</span>
                                    </td>
                                    <td class="py-2 whitespace-nowrap text-end">
                                        @php
                                            $url = url('cart/delete') . '?cartID='. ($_SESSION['cart_id'] ?? $item['cart_id']) . '&productID=' . $item['product_id'];
                                        @endphp
                                        <a onclick="return confirm('Are you sure?')" href="{{ $url }}">
                                            <span class="material-symbols-outlined mr-2 text-gray-400 hover:text-red-500 cursor-pointer">delete</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <aside class="col-span-4 h-fit pb-8 bg-gray-100 px-6">
                    <h3 class="font-semibold text-xl text-center uppercase p-6 border-b-2 border-gray-300">Order Summary</h3>
                    <div class="flex justify-between items-center pt-4">
                        <p class="font-semibold text-lg">Discounts</p>
                        <p class="font-semibold text-lg text-gray-400">0.00</p>
                    </div>
                    <div class="flex justify-between items-center pt-4">
                        <p class="font-semibold text-lg">Subtotal</p>
                        <p class="font-semibold text-lg text-red-500 total">{{number_format($total, 2, '.', ',')}}</p>
                    </div>
                    <a href="payment.html" class="mt-8 py-2 block text-center uppercase rounded font-bold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                        Check out
                    </a>
                </aside>
            </main>
        @else
            <div class="max-w-screen-xl m-auto grid place-items-center">
                <p class="text-xl font-semibold pt-8">Your cart is empty</p>
                <a href="{{ url('shop') }}" class="mt-8 py-2 px-5 tracking-wider text-center uppercase rounded font-bold text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white">
                    Shop our products
                </a>
            </div>
        @endif

    @endif

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusBtns = document.querySelectorAll('.btn-minus');
        const plusBtns = document.querySelectorAll('.btn-plus');
        const qtyNumberInputs = document.querySelectorAll('.qty-number');
        const priceInputs = document.querySelectorAll('.price');
        const subtotalElements = document.querySelectorAll('.subtotal');
        const totalElement = document.querySelector('.total'); // Selecting the total element

        // Đặt sự kiện khi click vào nút giảm
        minusBtns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                let currentValue = parseInt(qtyNumberInputs[index].value);
                if (currentValue > 1) {
                    qtyNumberInputs[index].value = currentValue - 1;
                    updateSubtotal(index); // Cập nhật tổng cộng khi giảm số lượng
                    updateTotal(); // Update the total when quantity changes
                }
            });
        });

        // Đặt sự kiện khi click vào nút tăng
        plusBtns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                let currentValue = parseInt(qtyNumberInputs[index].value);
                qtyNumberInputs[index].value = currentValue + 1;
                updateSubtotal(index); // Cập nhật tổng cộng khi tăng số lượng
                updateTotal(); // Update the total when quantity changes
            });
        });

        // Hàm cập nhật tổng cộng
        function updateSubtotal(index) {
            const quantity = parseInt(qtyNumberInputs[index].value);
            const price = parseFloat(priceInputs[index].value);
            const subtotal = quantity * price;
            subtotalElements[index].textContent = isNaN(subtotal) ? '0' : subtotal.toFixed(2);
        }

        // Hàm cập nhật tổng
        function updateTotal() {
            let newTotal = 0;
            subtotalElements.forEach(subtotalElement => {
                newTotal += parseFloat(subtotalElement.textContent);
            });
            totalElement.textContent = newTotal.toFixed(2);
        }
    });
</script>
@endsection