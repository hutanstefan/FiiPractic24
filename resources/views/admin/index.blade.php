@extends('layouts.master')

@extends('layouts.admincheck')

@section('title', 'Admin Panel')

@section('content')
    <div class="mt-20">
        <div class="mt-20">
            <div class="flex justify-center mb-4">
                <button id="showSellers" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-4 rounded transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">Show Sellers</button>
                <button id="showBuyers" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">Show Buyers</button>
        </div>

            <div id="sellersTable" class="overflow-x-auto text-center  ">
                <h2 class="text-xl font-bold mt-8 mb-4 text-blue-400">Sellers</h2>
                <table class="table-auto w-full border-collapse border border-gray-800">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Products for Sale</th>
                        <th class="px-4 py-2">Verified Products</th>
                        <th class="px-4 py-2">Hidden Products</th>
                        <th class="px-4 py-2">Last Product Uploaded</th>
                        <th class="px-4 py-2">Registered At</th>
                        <th class="px-4 py-2">Last Profile Update</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($users as $user)
                        @if($user->type === 'seller')
                            <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }}">
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->products()->count() }}</td>
                                <td class="border px-4 py-2">{{ $user->products()->where('verified', true)->count() }}</td>
                                <td class="border px-4 py-2">{{ $user->products()->where('hidden', true)->count() }}</td>
                                <td class="border px-4 py-2"> @php
                                        $latestProduct = $user->products()->latest('created_at')->first();
                                    @endphp
                                    @if($latestProduct)
                                        {{ $latestProduct->created_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif</td>
                                <td class="border px-4 py-2">{{ $user->created_at }}</td>
                                <td class="border px-4 py-2">{{ $user->updated_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div id="buyersTable" class="overflow-x-auto hidden text-center">
                <h2 class="text-xl font-bold mt-8 mb-4 text-blue-400">Buyers</h2>
                <table id="buyersTable" class="table-auto w-full border-collapse border border-gray-800">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Reviews Added</th>
                        <th class="px-4 py-2">Favorite Products</th>
                        <th class="px-4 py-2">Registered At</th>
                        <th class="px-4 py-2">Last Profile Update</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($users as $user)
                        @if($user->type === 'buyer')
                            <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }}">
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->reviews()->count() }}</td>
                                <td class="border px-4 py-2">{{ $user->favorites()->count() }}</td>
                                <td class="border px-4 py-2">{{ $user->created_at }}</td>
                                <td class="border px-4 py-2">{{ $user->updated_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

@endsection

