<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    // Vista de búsqueda o AJAX
    public function search(Request $request)
{
    if ($request->ajax()) {
        $q = $request->get('q');

        $usuarios = User::where('name', 'LIKE', '%' . $q . '%')
            ->limit(10)
            ->get(['id', 'name', 'image']);  // Usamos la columna 'image' para la foto de perfil

        // Añadimos la URL de la imagen de perfil a cada usuario
        $usuarios->map(function ($user) {
            $user->image_url = $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png');
            return $user;
        });

        return response()->json($usuarios);
    }

    return view('search');
}

    // Mostrar perfil del usuario por su nombre (único)
    public function perfil($name)
{
    $user = User::where('name', $name)
        ->with(['posts', 'likedPosts.user']) // Carga el autor de cada post que le gustó
        ->firstOrFail();

    return view('perfilSearch', compact('user'));
}

}
