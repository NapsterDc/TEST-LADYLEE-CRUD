@extends('layouts.app')

@section('content')
    <h1>Editar Categoría</h1>

    @auth
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nombre de la categoría</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
            <button type="submit">Actualizar Categoría</button>
        </form>
    @endauth

    @guest
        <p>Por favor, inicia sesión para editar esta categoría.</p>
    @endguest
@endsection
