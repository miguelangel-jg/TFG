<x-guest-layout>
    <x-slot name="title">Recuperar contraseña</x-slot>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">

    <div class="reset-container">
        <h2>¿Olvidaste tu contraseña?</h2>
        <p class="description">
            No hay problema. Introduce tu correo y te enviaremos un enlace para restablecerla.
        </p>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <div class="flex items-center justify-center mt-4">
                <x-primary-button>
                    {{ __('Enviar enlace') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <div class="background">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="100%" height="100%" viewBox="0 0 1600 900">
            <defs>
                <path id="wave" fill="rgba(92, 209, 120, 0.6)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
      s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
            </defs>
            <g>
                <use xlink:href="#wave" opacity=".4">
                    <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                        calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                        keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                </use>
                <use xlink:href="#wave" opacity=".6">
                    <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                        calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                        keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                </use>
                <use xlink:href="#wave" opacty=".9">
                    <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="4s"
                        calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                        keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                </use>
            </g>
        </svg>
    </div>
</x-guest-layout>
