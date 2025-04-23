<x-guest-layout>
    {{-- Title --}}
    <x-slot name="title">Registrarse</x-slot>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login container py-2 px-4">
        <figure class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/Logo_grande.png') }}" width="40%" alt="logo"/>
        </figure>

        <h2 class="mb-5">Bienvenido a The PlayGround</h2>

        <form method="POST" class="form" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="_form_token" value="{{ \Str::uuid() }}">

            <!-- Name -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="">
                <label for="name" class="d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">person</span>
                    Nombre de usuario
                </label>
            </div>
            <x-input-error :messages="$errors->get('name')" class="text-center p-0" />

            <!-- Email Address -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="{{old(key: 'email')}}"
                    placeholder="">
                <label for="email" class="d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">email</span>
                    Email
                </label>
            </div>
            <x-input-error :messages="$errors->get('email')" class="text-center p-0" />

            <!-- Password -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="">
                <label for="password" class="d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">lock</span>
                    Contraseña
                </label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="text-center p-0" />

            <!-- Confirm Password -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="">
                <label for="password_confirmation" class="d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">lock</span>
                    Confirmar contraseña
                </label>
            </div>
            <div class="d-flex alig"></div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-center p-0" />

            <button type="submit" class="btn">
                Registrarse
                <span class="material-symbols-outlined">how_to_reg</span>
            </button>

            <div class="mt-2 d-flex flex-column">
                <span>¿Ya tienes tu cuenta?</span>
                <a href="{{ route('login') }}">Inicia sesión aquí</a>
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
