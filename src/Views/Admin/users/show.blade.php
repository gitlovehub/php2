@extends('layouts.master')

@section('title')
    Thông tin người dùng
@endsection

@section('content')
    <h2 class="my-2 font-medium text-xl">Chi tiết người dùng: <span class="font-bold">{{ $user['name'] }}</span></h2>

    <table class="w-full divide-y divide-gray-200 font-medium">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Key</th>
                <th class="py-3 text-gray-600 text-left font-semibold uppercase tracking-wider">Value</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($user as $key => $value)
                <tr>
                    <td class="py-3 whitespace-nowrap uppercase font-bold">{{ $key }}</td>
                    <td class="py-3 whitespace-nowrap">
                        @if ($key === 'role')
                            @if ($value == 'admin')
                                Admin
                            @else
                                Member
                            @endif
                        @elseif ($key === 'password')
                            ******
                        @else
                            {{ $value }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection