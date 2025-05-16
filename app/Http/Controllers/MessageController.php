<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($name)
{
    $otherUser = User::where('name', $name)->firstOrFail();
    $authUser = auth()->user();

    // Obtener todos los mensajes entre el usuario autenticado y el otro usuario
    $messages = Message::where(function ($query) use ($authUser, $otherUser) {
        $query->where('sender_id', $authUser->id)
              ->where('receiver_id', $otherUser->id);
    })->orWhere(function ($query) use ($authUser, $otherUser) {
        $query->where('sender_id', $otherUser->id)
              ->where('receiver_id', $authUser->id);
    })
    ->orderBy('created_at', 'asc')
    ->get();

    return view('chats', compact('messages', 'otherUser'));
}

public function store(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'content' => 'nullable|string',
        'image' => 'nullable|image|max:2048', // máx 2MB
    ]);

    $message = new Message();
    $message->sender_id = Auth::id();
    $message->receiver_id = $request->receiver_id;
    $message->content = $request->content;

    if ($request->hasFile('image')) {
        $message->image = $request->file('image')->store('messages', 'public');
    }

    $message->save();

    // Redirige de vuelta al chat con ese usuario
    $receiver = User::find($request->receiver_id);
    return redirect()->route('messages.index', ['name' => $receiver->name]);
}

}
