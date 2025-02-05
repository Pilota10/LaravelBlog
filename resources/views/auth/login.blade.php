@extends('plantilla')

@section('titulo', 'Iniciar sesión')

@section('contenido')
    <div class="container mt-4">
        @if (!empty($error))
            <div class="text-danger">
                {{ $error }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="w-50 mx-auto">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="text" name="login" id="login" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Iniciar sesión">
        </form>
    </div>
@endsection