@extends('layouts.master')

@extends('layouts.chat_box',[ 'UserId' =>$loggedInUser->id ,'OtherUserId' =>$otherUser->id ,'OtherUserType' => $otherUser->type])

@section('title', 'Chat with ' .$otherUser->name)

@section('content')
    <div class="container mx-auto px-4 mt-20">
        <h1 class="text-4xl text-blue-400 font-bold mb-4"> {{ $otherUser->name }}'s chat box</h1>
        <div class="messages-container space-y-4" id="messages-container">
            @foreach ($messages as $message)
                <div class="message p-4 rounded-lg shadow-md
            @if ($message->sender_id == auth()->id())
                bg-gray-200 text-gray-800 flex justify-end
            @else
                bg-blue-400 text-white flex justify-start
            @endif">
                    @if ($message->sender_id != auth()->id())
                        <div class="w-10 h-10 flex-shrink-0 mr-2">
                            <img src="{{ asset('images/' . 'user_icon2.png') }}" alt="{{ $message->sender->name }}" class="rounded-full">
                        </div>
                    @endif
                    <div>
                        <p class="font-semibold">
                            @if ($message->sender_id == auth()->id())
                                Me
                            @else
                                {{ $message->sender->name }}
                            @endif
                        </p>
                        <p>{{ $message->text }}</p>
                        <p class="text-xs text-gray-500 mt-2">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                    @if ($message->sender_id == auth()->id())
                        <div class="w-10 h-10 flex-shrink-0 ml-2">
                            <img src="{{ asset('images/' . 'user_icon.png') }}" alt="{{ $loggedInUser->name }}" class="rounded-full">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>


        <div id="bottom">
            <form method="post" action="{{ route('messages.store') }}" class="mb-20 mt-10" id="message-form">
                @csrf
                <input type="hidden" name="sender_id" value="{{ $loggedInUser->id }}">
                <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
                <textarea name="text" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200" placeholder="Type your message here" rows="4"></textarea>
                <button type="submit" class="mt-2 mb-20 px-4 py-2 bg-blue-400 text-white rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Send</button>
            </form>
        </div>
    </div>

    <div class="fixed bottom-20 right-10">
        <button onclick="scrollToBottom()" class="px-4 py-2 bg-blue-400 text-white rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">﹀</button>
    </div>

@endsection
