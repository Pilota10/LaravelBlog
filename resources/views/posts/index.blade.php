@extends('plantilla')

@section('titulo', 'Listado de posts')

@section('h1')
    <h1 class="text-center">Listado de posts</h1>
@endsection

@section('contenido')
    <div class="container mt-4 d-flex flex-column align-items-center">
        @foreach ($posts as $post)
            <div class="card col-12 mb-3 h-100 d-flex flex-row" style="max-width: 100%; overflow-y: auto;">
                <div class="card-body d-flex flex-column flex-grow-1">
                    <h2 class="card-title h5">{{ $post->title }} ({{ $post->user->login }})</h2>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a class="btn mr-1 btn-primary" href="{{ route('posts.show', $post->id) }}">
                            Ver
                    </a>
                    @if(auth()->check() && (auth()->user()->id === $post->user_id || auth()->user()->role === 'admin'))
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection