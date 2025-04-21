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
    <a class="{{ request()->routeIs('search', 'search.*') ? 'active' : '' }}" href=""><i class="lni lni-search-1"></i></a>
    <a class="{{ request()->routeIs('messages', 'messages.*') ? 'active' : '' }}" href=""><i class="lni lni-message-2"></i></a>
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

    <!-- Modal para Escribir Publicación -->
    <div id="postModal" class="modal">
        <form class="modal-content" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="postModalLabel">Crear Publicación</h5>
              <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="content" class="form-label">Contenido</label>
                <textarea name="content" id="content" class="form-control" rows="4"
                          placeholder="¿Qué estás pensando?" required></textarea>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Subir Imagen (opcional)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
          </form>
    </div>
  </nav>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/sidebar.js') }}"></script>
