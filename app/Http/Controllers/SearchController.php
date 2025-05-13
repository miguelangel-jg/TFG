<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\Auth;

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

    // Para la vista no-AJAX: cargar el historial del usuario logueado
    $historial = [];
    if (auth()->check()) {
        $historial = SearchHistory::where('user_id', auth()->id())
            ->with('searchedUser')
            ->orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();
    }

    return view('search', compact('historial'));
}

    // Mostrar perfil del usuario por su nombre (único)
    public function perfil($name)
{
    $user = User::where('name', $name)
        ->with([
            'posts' => fn($q) => $q->latest(),
            'likedPosts.user' => fn($q) => $q->latest(),
        ])
        ->firstOrFail();

    // Guarda en el historial
    SearchHistory::updateOrCreate(
        ['user_id' => Auth::id(), 'searched_user_id' => $user->id],
        ['updated_at' => now()] // para que se actualice la fecha si ya existe
    );

    return view('perfilSearch', compact('user'));
}

public function destroy($id)
{
    $historial = SearchHistory::where('id', $id)
        ->where('user_id', auth()->id()) // Asegura que solo se borren elementos del usuario actual
        ->firstOrFail();

    $historial->delete();

    return back(); // O puedes usar `return response()->json(['success' => true]);` si quieres hacerlo por AJAX
}


}
