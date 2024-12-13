@extends('layouts.app')

@section('content')
    <h1>Categorías</h1>

    @auth
        <a href="{{ route('categories.create') }}">Crear Nueva Categoría</a>
    @endauth

    @guest
        <p>Por favor, inicia sesión para acceder a esta opción.</p>
    @endguest

    <!-- Lista de categorías -->
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category->id) }}">Editar</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
