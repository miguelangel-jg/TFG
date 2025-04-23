<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">
                    {{-- Header --}}
                    <tr>
                        <td style="background-color:#1a73e8; padding:20px; text-align:center;">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo" width="120" style="display:block; margin:0 auto;">
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:40px; font-family:Arial, sans-serif; color:#333333;">
                            <h1 style="margin-top:0; color:#1a73e8; font-size:24px;">¡Hola, {{ $user->name }}!</h1>
                            <p style="font-size:16px; line-height:1.5;">
                                ¡Gracias por registrarte en <strong>{{ config('app.name') }}</strong>! Estamos encantados de darte la bienvenida a nuestra comunidad.
                            </p>
                            <p style="font-size:16px; line-height:1.5;">
                                Para comenzar, puedes acceder al panel de usuario y explorar todas las funcionalidades que hemos preparado para ti.
                            </p>
                            <div style="text-align:center; margin:30px 0;">
                                <a href="{{ url('/') }}" style="background-color:#1a73e8; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:4px; display:inline-block; font-size:16px;">
                                    Ir al sitio
                                </a>
                            </div>
                            <p style="font-size:14px; color:#666666; line-height:1.5;">
                                Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos respondiendo a este correo.
                            </p>
                            <p style="font-size:14px; color:#666666; line-height:1.5; margin-bottom:0;">
                                ¡Nos vemos pronto!<br>
                                El equipo de {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color:#f0f0f0; padding:20px; text-align:center; font-family:Arial, sans-serif; font-size:12px; color:#999999;">
                            © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.<br>
                            <a href="{{ url('/privacy') }}" style="color:#1a73e8; text-decoration:none;">Política de privacidad</a> |
                            <a href="{{ url('/terms') }}" style="color:#1a73e8; text-decoration:none;">Términos de uso</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
