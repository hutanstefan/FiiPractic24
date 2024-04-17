@extends('layouts.master')

@extends('layouts.buyercheck');

@section('title')
    View Favorites
@endsection

@section('content')
    <div class="container mx-auto px-4 mt-24 mb-20">
        <h1 class="text-2xl text-blue-400 font-bold my-4 text-center">Favorite Products</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @if($favorites->isEmpty())
                <p class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-xl font-bold text-red-500">
                    No favorites products.
                </p>
            @else
                @foreach($favorites as $favorite)
                    <div class="border border-gray-200 p-4 flex flex-col items-stretch">
                        <a href="{{ route('products.product', ['id' => $favorite->id]) }}">
                            <img class="object-cover h-auto w-full rounded-lg" src="{{ asset('images/' . $favorite->image) }}" alt="{{ $favorite->name }}">
                        </a>
                        <div class="flex flex-col justify-between mt-4 flex-grow">
                            <div></div>
                            <div>
                                <h2 class="text-lg font-semibold text-center text-gray-700">{{ $favorite->name }}</h2>
                                <h2 class="text-lg font-semibold text-center text-blue-500">Price: ${{ $favorite->price }}</h2>
                                <div class="text-center text-sm text-blue-400">Location: {{ $favorite->location }}</div>
                                <div class="text-center text-sm text-blue-400">Created: {{ $favorite->updated_at }}</div>
                                <form action="{{ route('removeFromFavorites', ['product' => $favorite->id]) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded block w-full text-center">Remove Favorite</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </div>
@endsection
