@extends('layouts.master')

@extends('layouts.sellercheck')

@section('title')
    Add product
@endsection

@section('content')
    <div class="container mx-auto px-4 flex justify-center mt-24 mb-24">
        <div class="w-full max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-center text-xl font-bold mb-6">Add Product</h2>
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" name="name" id="name" class="form-input" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" class="form-textarea">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                    <input type="number" name="price" id="price" class="form-input" value="{{ old('price') }}">
                    @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" name="location" id="location" class="form-input" value="{{ old('location') }}">
                    @error('location')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                    <select name="type" id="type" class="form-select">
                        <option value="Electronics">Electronics</option>
                        <option value="Animals">Animals</option>
                        <option value="Toys">Toys</option>
                        <option value="Auto">Auto</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Others">Others</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Telephone:</label>
                    <input type="tel" name="telephone" id="telephone" class="form-input" value="{{ old('telephone') }}">
                    @error('telephone')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                    <input type="file" name="image" id="image" class="form-input">
                    @error('image')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    @if(session('uploaded_image'))
                        <img src="{{ asset('storage/images/' . session('uploaded_image')) }}" alt="{{ session('uploaded_image') }}">
                    @endif
                </div>


                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Product</button>
                </div>
            </form>


        </div>
    </div>
@endsection
