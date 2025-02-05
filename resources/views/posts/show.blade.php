@extends('plantilla')

@section('titulo', 'Ficha del post')

@section('h1')
<h1 class="text-center">{{ $post->title }}</h1>
@endsection

@section('contenido')
    <div class="container mt-4">
        <div class="">
            <div class="">
                <p>{{ $post->content }}</p>
            </div>
            <div class="">
                Creado por {{ $post->user->login }} el: {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}
            </div>
        </div>

        <h3 class="mt-4">Comentarios</h3>
        <div class="list-group">
            @foreach ($post->comentarios as $comment)
                <div class="list-group-item">
                    <p class="card-text">{{ $comment->content }}</p>
                    <small class="text-muted">Por {{ $comment->user->login }} el: {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y H:i') }}</small>
                </div>
            @endforeach
        </div>

        @if(auth()->check() && auth()->user()->id === $post->user_id)
            <form action="{{ route('posts.edit', $post->id) }}" method="GET" class="mt-4">
                @csrf
                @method('GET')
                <button class="btn btn-success">
                    Modificar
                </button>
            </form>
        @endif
    </div>
@endsection