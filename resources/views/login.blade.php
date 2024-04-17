@extends('layouts.master')

@section('title')
    Login
@endsection

@section('head')
    <link href='/' rel='stylesheet'>
@endsection

@section('content')

    <div class="flex justify-center items-center h-auto mt-20">
        <div class="mt-16 mx-auto px-4 mb-24">  <div class="w-full max-w-xs">
                @if(session('success'))
                    <div>{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                    @csrf
                    <h2 class="text-center text-xl font-bold mb-6">Login</h2>

                    @if($errors->any())
                        <div class="text-red-500 mb-4">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" class="form-input" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" class="form-input" id="password" name="password" required>
                    </div>

                    <div class="flex items-center justify-center mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">Login</button>
                        <a href="{{ route('register') }}" class="text-sm text-blue-500 hover:text-blue-800">Don't have an account? Register here.</a>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-center mb-4 mt-4">
                <a href="{{ route('showLinkRequestForm') }}" class="text-sm text-blue-500 hover:text-blue-800">Forgot your password?</a>
            </div>

        </div>
    </div>

@endsection
