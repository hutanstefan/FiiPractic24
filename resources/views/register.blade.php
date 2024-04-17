@extends('layouts.master')

@section('title', 'Register')

@section('head')
    <link href='/' rel='stylesheet'>
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen mt-20">
        <div class="w-full max-w-xs">
            <div class="container">
                <h2 class="text-center text-xl font-bold mb-6">Register</h2>

                <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="form-input">
                        @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input id="email" type="email" name="email" required autocomplete="email" value="{{ old('email') }}" class="form-input">
                        @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-input">
                        @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Account Type:</label>
                        <div>
                            <input type="radio" id="buyer" name="type" value="buyer" required class="mr-2">
                            <label for="buyer">Buyer</label>
                        </div>
                        <div>
                            <input type="radio" id="seller" name="type" value="seller" required class="mr-2">
                            <label for="seller">Seller</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-800">Login now!</a></p>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
