<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Obtener los posts más recientes
        $posts = Post::where('user_id', $request->user()->id)->latest()->get();
        return view('profile.edit', [
            'user' => $request->user(),
            'posts' => $posts,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();



        // Verificar si hay un archivo de imagen
        if ($request->hasFile('profile_photo')) {
            // Eliminar la imagen anterior si no es la predeterminada
            if ($user->profile_photo_path && $user->profile_photo_path !== 'img/user.png') {
                // Eliminar el archivo físico en el almacenamiento
                Storage::disk('public')->delete(str_replace('storage/', '', $user->profile_photo_path));
            }

            // Guardar la nueva imagen
            $path = $request->file('profile_photo')->store('perfiles', 'public');
            $user->profile_photo_path = 'storage/' . $path;
        }

        // Rellenar otros campos de usuario
        $user->fill($request->validated());

        // Si el email cambia, marca la verificación del email como null
        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Redirigir con un mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function config(Request $request)
    {
        $user = $request->user();
        return view('profile.config', compact('user'));
    }
}
