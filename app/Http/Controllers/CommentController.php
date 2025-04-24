<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{

    public function store(Request $request, Post $post){
    $request->validate([
        'content' => 'required|string|max:500',
    ]);

    $post->comments()->create([
        'user_id' => auth()->id(),
        'content' => $request->content,
    ]);

    return redirect()->back();
}

public function destroy(Comment $comment)
{

    $comment->delete();

    return back()->with('success', 'Comentario eliminado.');
}


}
