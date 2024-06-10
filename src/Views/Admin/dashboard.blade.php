@extends('layouts.master')

@section('title')
    Thống kê    
@endsection

@section('content')
<div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="text-gray-500 text-lg font-bold">Total Users</span>
                <span class="text-2xl font-semibold">{{ $totalUsers }}</span>
            </div>
            <div class="w-16">
                <img src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg" alt="">
            </div>
        </div>
        <div>
            <span>
                @if ($monthlyUsers > 0)
                    @php
                        $qty = $monthlyUsers;
                        $clr = 'bg-green-400';
                    @endphp
                    Increase
                @elseif ($monthlyUsers < 0)
                    @php
                        $qty = abs($monthlyUsers);
                        $clr = 'bg-red-400';
                    @endphp
                    Decrease
                @else
                    @php
                        $qty = 0;
                        $clr = 'bg-blue-400';
                    @endphp
                    No Change
                @endif
            </span>
            <span class="inline-block px-3 py-1 text-sm font-semibold text-white {{$clr}} rounded">{{ $qty }}</span>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="text-gray-500 text-lg font-bold">Total Products</span>
                <span class="text-2xl font-semibold">{{ $totalProducts }}</span>
            </div>
            <div class="w-16">
                <img src="https://static.vecteezy.com/system/resources/previews/028/047/017/non_2x/3d-check-product-free-png.png" alt="">
            </div>
        </div>
        <div>
            <span>Available</span>
            <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-blue-400 rounded">{{ $availableProducts }}</span>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="text-gray-500 text-lg font-bold">Total Categories</span>
                <span class="text-2xl font-semibold">{{ $totalCategories }}</span>
            </div>
            <div class="w-16">
                <img src="https://cdn-icons-png.flaticon.com/512/3843/3843537.png" alt="">
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="text-gray-500 text-lg font-bold">Total Orders</span>
                <span class="text-2xl font-semibold">{{ $totalOrders }}</span>
            </div>
            <div class="w-16">
                <img src="https://cdn-icons-png.freepik.com/256/3045/3045670.png?semt=ais_hybrid" alt="">
            </div>
        </div>
    </div>
</div>

@php
    $dataPoints = [];
@endphp

@foreach ($orders as $item)
    @php
        $dataPoints[] = ["x" => $item['date'], "y" => $item['total']];
    @endphp
@endforeach

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<div class="pt-8">
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
</div>

<script>
    window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1",
            title: {
                text: "Orders in 6 Month"
            },
            axisY: {
                includeZero: true
            },
            data: [{
                type: "column",
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
</script>

@endsection