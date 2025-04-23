<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PreventDuplicateSubmission
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() === 'POST') {
            $token = $request->input('_form_token');

            // Verifica si el token ya fue utilizado
            if ($token && Session::has('_used_form_tokens.' . $token)) {
                return back()->with('error', 'Formulario ya enviado. Por favor, espera un momento.');
            }

            // Guarda el token en la sesión para evitar que se reenvíe
            Session::put('_used_form_tokens.' . $token, true);
        }

        return $next($request);
    }
}
