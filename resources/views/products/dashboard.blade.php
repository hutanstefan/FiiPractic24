@extends('layouts.master')

@section('title')
    All products
@endsection

@section('content')


    <div class="flex justify-center items-center mt-20">
        <form action="{{ route('products.allproducts') }}" method="GET" class="max-w-sm">
            <div class="flex items-center border-b border-b-2 border-blue-500 py-2">
                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="search" name="search" placeholder="Search Products..." aria-label="Search">
                <button class="flex-shrink-0 ml-2 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="flex justify-center items-center mt-10">
        <button id="filterButton" class="bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded transition duration-200">Filter Options</button>
    </div>

    <div id="filterOptions" class="hidden flex justify-center items-center mt-4 mb-4">
        <form action="{{ route('products.allproducts') }}" method="GET" class="max-w-sm">
            <div class="flex flex-col items-center space-y-4">

                <div class="flex flex-wrap justify-center space-x-2 mb-4">
                    <div class="m-2">
                        <input type="radio" name="type" value="" id="all" class="sr-only" checked>
                        <label for="all" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">All</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="Electronics" id="electronics" class="sr-only">
                        <label for="electronics" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">Electronics</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="Animals" id="animals" class="sr-only">
                        <label for="animals" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">Animals</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="Toys" id="toys" class="sr-only">
                        <label for="toys" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">Toys</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="Auto" id="auto" class="sr-only">
                        <label for="auto" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">Auto</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="Clothes" id="clothes" class="sr-only">
                        <label for="clothes" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">Clothes</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="asc" id="asc" class="sr-only">
                        <label for="asc" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">By Price ↑</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="desc" id="desc" class="sr-only">
                        <label for="desc" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">By Price ↓</label>
                    </div>
                    <div class="m-2">
                        <input type="radio" name="type" value="Others" id="others" class="sr-only">
                        <label for="others" class="px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700 transition duration-200">Others</label>
                    </div>
                </div>

                <button class="bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded transition duration-200" type="submit">
                    Filter
                </button>
            </div>
        </form>
    </div>


    <div class="container mx-auto px-4 mt-24 mb-20">
        <h1 class="text-4xl font-bold my-4 text-center text-blue-500 mb-20">Products</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($products as $product)
                <a href="{{ route('products.product', ['id' => $product->id]) }}" class="border border-gray-200 p-4 flex flex-col justify-between shadow-lg rounded-lg hover:shadow-2xl transition duration-500">
                    <div class="mb-2">
                        <img class="object-cover h-80 w-full rounded-lg" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>

                <div class="mt-auto">
                        <h2 class="text-lg font-semibold text-center text-gray-700">{{ $product->name }}</h2>
                    </div>
                    <div class="mt-auto">
                        <h2 class="text-lg font-semibold text-center text-blue-500">Price: ${{ $product->price }}</h2>
                    </div>
                    <hr class="mt-2 mb-2 border-gray-300">
                    <div class="mt-auto">
                        <div class="text-center text-sm text-blue-400">Location: {{ $product->location }}</div>
                    </div>
                    <div class="mt-auto">
                        <div class="text-center text-sm text-blue-400">Created: {{ $product->updated_at }}</div>
                    </div>

                </a>
            @endforeach
        </div>
    </div>

@endsection


