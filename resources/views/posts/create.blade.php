@extends('plantilla')

@section('titulo', 'Crear post')

@section('h1')
<h1 class="text-center"></h1>
@endsection

@section('contenido')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="Title">Tile</label>
        <input type="text" name="title" id="title" class="form-control">
        <label for="Content">Content</label>    
        <textarea name="content" id="content" class="form-control"></textarea>
        <label for="autor">Autor:</label>
        
        <select class="form-control" name="author" id="autor">
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">                
                {{ $usuario->login }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Enviar" class="btn btn-primary mt-4">
    </form>
@endsection