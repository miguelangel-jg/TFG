<!-- Iconos y fuentes -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap"
  rel="stylesheet"
/>
<link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
<!-- Bootstrap CSS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
/>
{{-- CSS --}}
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<nav class="navbar d-flex justify-content-around align-items-center">
    <a class="{{ request()->routeIs('dashboard', 'dashboard.*') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="lni lni-home-2"></i></a>
    <a class="{{ request()->routeIs('search', 'search.*') ? 'active' : '' }}" href="{{ route('search') }}"><i class="lni lni-search-1"></i></a>
    <a class="{{ request()->routeIs('messages', 'messages.*') ? 'active' : '' }}" href="{{ route('messages') }}"><i class="lni lni-message-2"></i></a>
    <a class="{{ request()->routeIs('profile', 'profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}"><i class="lni lni-user-4"></i></a>

    <!-- FAB solo visible en la ruta 'dashboard' -->
    @if (request()->routeIs('dashboard', 'dashboard.*'))
        <!-- FAB (Botón de Publicar) -->
        <div class="fab">
        <button id="openModal">
            <i class="lni lni-plus"></i>
        </button>
        </div>
    @endif

    <!-- Modal para Crear Publicación -->
    <div id="postModal" class="custom-modal">
        <form class="modal-content-custom" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_form_token" value="{{ \Str::uuid() }}">

            <!-- Cabecera del modal -->
            <div class="modal-header-custom">
                <h5 class="modal-title-custom">Crear nueva publicación</h5>
                <span class="close-custom" id="btn-close">&times;</span>
            </div>

            <!-- Cuerpo del modal -->
            <div class="modal-body-custom">
                <label for="content" class="form-label-custom">¿Qué estás pensando?</label>
                <textarea name="content" id="content" rows="4" required></textarea>

                <label for="image" class="form-label-custom mt-3">Subir imágenes (opcional)</label>
                <input type="file" name="images[]" id="image" accept="image/*" multiple>
            </div>

            <!-- Pie del modal -->
            <div class="modal-footer-custom">
                <button type="submit" class="btn-submit">Publicar</button>
            </div>
        </form>
    </div>

  </nav>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/sidebar.js') }}"></script>
