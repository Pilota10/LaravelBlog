@extends('plantilla')

@section('titulo', 'Crear post')

@section('h1')
<h1 class="text-center"></h1>
@endsection

@section('contenido')
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="Title">Tile</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        @if ($errors->has('title'))
            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
        @endif
        <label for="Content">Content</label>    
        <textarea name="content" id="content" class="form-control">{{ $post->content }}</textarea>
        @if ($errors->has('content'))
            <div class="alert alert-danger">{{ $errors->first('content') }}</div>
        @endif  
        <label for="autor">Autor:</label>
        
        <select class="form-control" name="author" id="autor" >
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $usuario->id == $post->user_id ? 'selected' : '' }}>                
                    {{ $usuario->login }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Enviar" class="btn btn-primary mt-4">
    </form>
@endsection