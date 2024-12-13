@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Categoría</h1>

    @auth
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name">Nombre de la categoría</label>
            <input type="text" name="name" id="name" required>
            <button type="submit">Crear Categoría</button>
        </form>
    @endauth

    @guest
        <p>Por favor, inicia sesión para crear una categoría.</p>
    @endguest
@endsection
