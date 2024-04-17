@extends('layouts.master')

@extends('layouts.admincheck')

@section('title')
    Pending Products
@endsection

@section('content')
    <div class="container mx-auto px-4 mt-24 mb-20">
        <h1 class="text-2xl font-bold my-4">Pending Products</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($pendingProducts as $product)
                <div class="border border-gray-200 p-4 flex flex-col justify-between">
                    <div class="mb-2">
                        <a href="{{ route('products.product', ['id' => $product->id]) }}" class="border border-gray-200 p-4 flex flex-col justify-between shadow-lg rounded-lg hover:shadow-2xl transition duration-500">
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                        <p class="text-sm">Type: {{ $product->type }}</p>
                        <p class="text-sm">Description: {{ \Illuminate\Support\Str::limit($product->description, 200) }}</p>


                    </div>
                    <div class="mt-4">
                        <form action="{{ route('products.accept', ['id' => $product->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure you want to accept this product?')">Accept</button>
                        </form>
                        <form action="{{ route('products.reject', ['id' => $product->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure you want to reject this product?')">Reject</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
