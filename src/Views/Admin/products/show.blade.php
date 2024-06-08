@extends('layouts.master')

@section('title')
    Thông tin sản phẩm
@endsection

@section('content')
    <h2 class="my-2 font-medium text-xl">Chi tiết sản phẩm: <span class="font-bold">{{ $product['name'] }}</span></h2>

    <table class="w-full divide-y divide-gray-200 font-medium">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Key</th>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Value</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($product as $key => $value)
                <tr>
                    <td class="py-3 whitespace-nowrap uppercase font-bold">{{ $key }}</td>
                    <td class="py-3 whitespace-nowrap">
                        {{ $value }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection