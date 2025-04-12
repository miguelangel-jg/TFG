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
        if ($request->hasFile('image')) {
            // Guardar la imagen en el almacenamiento y obtener la ruta
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
        }
        $post->user_id = auth()->id(); // Si estás usando autenticación y quieres asociar al usuario
        $post->save();

        // Redirigir a la página principal o a alguna vista específica
        return redirect()->route('dashboard')->with('success', 'Post creado exitosamente');
    }
}
