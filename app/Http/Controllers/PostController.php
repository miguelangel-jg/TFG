<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos del post
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // Máximo 2MB
        ]);

        // Crear un nuevo post
        $post = new Post();
        $post->content = $request->content;
        $post->user_id = auth()->id(); // Asociar el usuario
        $post->save();

        // Ahora guardar las imágenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $post->images()->create([
                    'path' => $path
                ]);
            }
        }

        // Redirigir a la página principal o a alguna vista específica
        return redirect()->route('dashboard')->with('success', 'Post creado exitosamente');
    }

    //Dar me gusta a un post
    public function toggleLike(Post $post)
    {
        $user = auth()->user();

        // Verificamos si el usuario ya dio like a este post
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            // Si ya existe un like, lo eliminamos
            $like->delete();
        } else {
            // Si no existe un like, lo creamos
            $post->likes()->create(['user_id' => $user->id]);
        }

        // Redirigimos de nuevo a la vista con el post
        return redirect()->back();
    }

}
