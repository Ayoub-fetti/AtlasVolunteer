<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $sentConversations = $user->conversations()->with('receiver')->get();
        $receivedConversations = Conversation::where('receiver_id', $user->id)->with('user')->get();
        $conversations = $sentConversations->concat($receivedConversations);
        $users = User::where('id', '!=', $user->id)->get();
        return view('conversation', compact('conversations','users'));
    }

    public function show($conversationId)
    {
        $user = Auth::user();
        $messages = Message::where('conversation_id', $conversationId)->with('sender')->get();
        $conversation = Conversation::findOrFail($conversationId);
        $receiver = $conversation->user_id === $user->id
            ? User::findOrFail($conversation->receiver_id)
            : User::findOrFail($conversation->user_id);
    
        return view('message', compact('messages', 'receiver', 'conversationId'));
    }

    public function send(Request $request, $conversationId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'conversation_id' => $conversationId,
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return response()->json($message);
    }
    public function createConversation(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
        ]);

        $conversation = Conversation::firstOrCreate([
            'user_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
        ]);

        return redirect()->route('messages.show', $conversation->id);
    }
}