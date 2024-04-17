<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function allChats()
    {
        $userId = auth()->id();

        $latestMessages = Message::with('sender', 'receiver')
            ->whereIn('id', function ($query) use ($userId) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('messages')
                    ->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId)
                    ->groupBy(DB::raw('CASE
                    WHEN sender_id = ' . $userId . ' THEN receiver_id
                    ELSE sender_id
                END'));
            })
            ->orderBy('id')
            ->get();


        return view('messages.all_chats', compact('latestMessages','userId'));
    }


    public function index(User $otherUser)
    {
        $loggedInUser = auth()->user();

        $messages = Message::where(function ($query) use ($loggedInUser, $otherUser) {
            $query->where('sender_id', $loggedInUser->id)->where('receiver_id', $otherUser->id);
        })->orWhere(function ($query) use ($loggedInUser, $otherUser) {
            $query->where('sender_id', $otherUser->id)->where('receiver_id', $loggedInUser->id);
        })->get();

        $messages = $messages->sortBy('id');

        return view('messages.index', compact('messages', 'loggedInUser', 'otherUser'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'text' => 'required|string',
        ]);

        $message = new Message();
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->text = $request->text;

        $message->save();

        return redirect()->route('messages.index', ['otherUser' => $request->receiver_id])->with('success', 'Message sent successfully.');
    }

}
