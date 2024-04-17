@extends('layouts.master')

@extends('layouts.productvalidate',['productIdOwner' => $product->user_id,'productIsValidate' => $product->verified,'productIsHidden'=>$product->hidden])

@section('title', $product->name)

@section('content')


    <div class="container mx-auto px-4 mt-20 mb-20">

        <div class="flex flex-wrap -mx-4 justify-center">

            <div class="w-full md:w-1/2 px-4 mb-4">
                <div class="border border-gray-200 p-4 shadow-lg rounded-lg">
                    <img class="object-cover h-auto w-full rounded-lg" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
            </div>

            <div class="w-full md:w-1/2 px-4 mb-4 text-center">
                <div class="border border-gray-200 p-4 shadow-lg rounded-lg">
                    <h2 class="text-3xl text-blue-400 font-bold mb-4">{{ $product->name }}</h2>
                    <div class="w-full px-4 mb-4">
                        <div class="border border-blue-400 p-4 shadow-lg rounded-lg text-center">
                            @if (number_format($averageRating, 1) != 0)
                            <div class="mb-2">
                            <h2 class="text-2xl font-bold ">Average Rating:</h2>
                                <p class="text-lg text-gray-700" style="display: flex; align-items: center; justify-content: center;">
                                    {{ number_format($averageRating, 1) }}
                                    <svg style="margin-left: 5px; margin-top: 10px;" width="38" height="38" viewBox="0 0 24 24" stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="border: 1px solid black; padding: 2px;">
                                        <path fill="yellow" d="M12 2 l1.26 4.35 4.98 0.36 -3.83 2.79 1.25 4.85 -4.16 -3.08 -4.16 3.08 1.25 -4.85 -3.83 -2.79 4.98 -0.36L12 2zm0 5 l-2.84 "></path>
                                    </svg>
                                </p>
                            </div>
                            @endif
                            <div class="mb-2">
                                <h2 class="text-2xl font-bold ">Price:</h2>
                                <p class="text-lg text-black"> ${{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-2">
                            <p class="text-lg font-semibold text-gray-700">Location:</p>
                            <p class="text-lg text-black">{{ $product->location }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-lg font-semibold text-gray-700">Type:</p>
                            <p class="text-lg text-black">{{ $product->type }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-lg font-semibold text-gray-700">Telephone:</p>
                            <p class="text-lg text-black">{{ $product->telephone }}</p>
                        </div>
                        @if($product->user)
                            <div class="mb-2">
                                <p class="text-lg font-semibold text-gray-700">Owner:</p>
                                <a href="{{ route('messages.index', ['otherUser' => $product->user->id]) }}" class="text-lg text-blue-500 hover:text-black hover:underline">{{ $product->user->name }}</a>
                            </div>
                        @if(Auth::check() && Auth::user()->type == 'buyer')
                                @if(Auth::user()->favorites->contains($product->id))
                                    <form action="{{ route('removeFromFavorites', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Remove from favorite
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('addToFavorites', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Add favorite
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-full px-4 mb-4">
                <div class="border border-gray-200 p-4 shadow-lg rounded-lg text-center">
                    <h2 class="text-2xl text-blue-400 font-bold mb-10">Description:</h2>
                    <p class="text-lg text-gray-700">{{ $product->description }}</p>
                </div>
            </div>

            @if($product->reviews->count() > 0)
                <div class="w-full px-4 mb-4">
                    <div class="border border-gray-200 p-4 shadow-lg rounded-lg">
                        <h2 class="text-2xl text-blue-400 font-bold mb-10">Reviews:</h2>
                        <ul>
                            @foreach($product->reviews as $review)
                                <li class="bg-white p-3 shadow-md rounded-md my-2 flex items-start space-x-2">
                                    <img class="w-12 h-12 rounded-full" src="{{ asset('images/' . 'user_icon.png') }}" alt="User Image">
                                    <div>
                                        <p class="font-bold">{{ $review->user->name }}</p>
                                        <p>{{ $review->content }}</p>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-yellow-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p>Scor: {{ $review->score }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif


        @if(Auth::check() && Auth::user()->type == 'buyer')
                <div class="w-full px-4 mb-4">
                    <div class="border border-gray-200 p-4 shadow-lg rounded-lg text-center">
                        <h2 class="text-2xl text-blue-400 font-bold mb-4">Add a Review:</h2>
                        <form action="{{ route('addReview', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="content" class="block text-lg font-semibold text-gray-700">Review:</label>
                                <textarea name="content" id="content" rows="4" class="form-textarea mt-1 block w-full rounded-lg border-gray-300" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="score" class="block text-lg font-semibold text-gray-700">Score:</label>
                                <div class="flex items-center justify-center">
                                    <input type="hidden" name="score" id="score" required>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg onclick="setScore({{ $i }})" id="star{{ $i }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-gray-500 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2 l1.26 4.35 4.98 0.36 -3.83 2.79 1.25 4.85 -4.16 -3.08 -4.16 3.08 1.25 -4.85 -3.83 -2.79 4.98 -0.36L12 2zm0 5 l-2.84 "></path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Submit Review
                            </button>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection
