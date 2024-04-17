@extends('layouts.master')

@extends('layouts.sellercheck')

@section('title')
    My Products
@endsection

@section('content')
    <div class="container mx-auto px-4 mt-24 mb-20">
        <h1 class="text-2xl text-blue-400 font-bold my-4 text-center">My Products</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($products as $product)
                <div class="border border-gray-200 p-4 flex flex-col justify-between">
                    <div class="mb-2">
                        <a href="{{ route('products.product', ['id' => $product->id]) }}" class="border border-gray-200 p-4 flex flex-col justify-between shadow-lg rounded-lg hover:shadow-2xl transition duration-500">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="mt-auto">
                        <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                        <p class="text-sm">Status:
                            <span class="{{ $product->verified ? 'text-green-500' : 'text-red-500' }}">
                                {{ $product->verified ? 'Accepted' : 'Pending' }}
                            </span>
                        </p>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="bg-blue-500 text-white px-2 py-1 rounded ml-2">Update</a>

                        @if($product->hidden)
                            <form action="{{ route('products.hide', ['id' => $product->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="bg-gray-500 text-white px-2 py-1 rounded ml-2">Unhide</button>
                            </form>
                        @else
                            <form action="{{ route('products.hide', ['id' => $product->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="bg-gray-500 text-white px-2 py-1 rounded ml-2">Hide</button>
                            </form>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
