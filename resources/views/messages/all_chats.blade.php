@extends('layouts.master')

@section('title', 'Messages')

@section('content')
    <div class="container mx-auto px-4 mt-20">
        <h1 class="text-4xl text-blue-400 font-bold mb-4">Messages</h1>
        <div class="messages-container space-y-4">
            @foreach ($latestMessages as $message)
                <a href="{{ route('messages.index', [$message->sender_id == $userId ? $message->receiver_id : $message->sender_id]) }}">
                    <div class="message p-4 rounded-lg shadow-md mb-4 {{ $message->sender_id == $userId ? 'bg-gray-200 text-gray-800' : 'bg-blue-400 text-gray-800' }} hover:bg-gray-300 hover:text-gray-900 transition-colors duration-300">
                        <p class="font-semibold">
                            @if ($message->sender_id == $userId)
                                {{ $message->receiver->name }}
                            @else
                                {{ $message->sender->name }}
                            @endif
                        </p>
                        @if ($message->sender_id == $userId)
                            <p> Me: {{ $message->text }} </p>
                        @else
                            <p>  {{ $message->text }} </p>
                        @endif
                        <p class="text-xs text-gray-500 mt-2">
                            {{ is_object($message->created_at) ? $message->created_at->diffForHumans() : $message->created_at }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
