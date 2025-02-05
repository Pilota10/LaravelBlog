<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">Listado de posts</a>
        @if(auth()->check())
        <a class="nav-link active" aria-current="page" href="{{ route('posts.create') }}">Crear un post</a>
        <a class="nav-link active" href="{{ route('logout') }}">Cerrar sesión</a>
        @else
          <a class="nav-link active" href="{{ route('loginform') }}">Iniciar sesión</a>
        @endif
      </div>
      <p class="ms-auto my-auto">{{ currentDate('Y/m/d') }}</p>
    </div> 
  </div>
</nav>
 