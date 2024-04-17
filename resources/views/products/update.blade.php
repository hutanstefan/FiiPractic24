@extends('layouts.master')

@extends('layouts.sellercheck');
@extends('layouts.update_product_validate',['userId' => $product->user_id]);

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="container mx-auto px-4 mt-24 mb-20">
        <h1 class="text-center text-4xl text-blue-400 font-bold my-4">Edit Product</h1>

        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" class="space-y-4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="name">Name</label> <!-- Am mărit dimensiunea textului -->
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ $product->name }}" placeholder="Name">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="description">Description</label> <!-- Am mărit dimensiunea textului -->
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Description">{{ $product->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="price">Price</label> <!-- Am mărit dimensiunea textului -->
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" name="price" value="{{ $product->price }}" placeholder="Price">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="location">Location</label> <!-- Am mărit dimensiunea textului -->
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="location" type="text" name="location" value="{{ $product->location }}" placeholder="Location">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="type">Type:</label> <!-- Am mărit dimensiunea textului -->
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="type" id="type">
                    <option value="Electronics" {{ $product->type === 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="Animals" {{ $product->type === 'Animals' ? 'selected' : '' }}>Animals</option>
                    <option value="Toys" {{ $product->type === 'Toys' ? 'selected' : '' }}>Toys</option>
                    <option value="Auto" {{ $product->type === 'Auto' ? 'selected' : '' }}>Auto</option>
                    <option value="Clothes" {{ $product->type === 'Clothes' ? 'selected' : '' }}>Clothes</option>
                    <option value="Others" {{ $product->type === 'Others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('type')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="telephone">Telephone</label> <!-- Am mărit dimensiunea textului -->
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telephone" type="number" name="telephone" value="{{ $product->telephone }}" placeholder="Telephone">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="image">Image:</label> <!-- Am mărit dimensiunea textului -->
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="image" id="image">
                @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

                @if($product->image)
                    <h2 class="text-center text-2xl font-semibold mb-4">Current image:</h2>
                    <img class="w-64 h-64 mx-auto shadow-lg rounded-lg" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}">
                @endif

            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
