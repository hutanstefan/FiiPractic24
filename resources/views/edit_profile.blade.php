@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <div class="container">
                @if(session('success'))
                    <div>{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="text-red-500 mb-4">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('update_profile') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <h2 class="text-center text-xl font-bold mb-6">Edit Profile</h2>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" class="form-input" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" class="form-input" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" class="form-input" id="password" name="password">
                    </div>

                    <div class="flex items-center justify-center mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
