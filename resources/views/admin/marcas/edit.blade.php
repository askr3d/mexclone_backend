@extends('adminlte::page')

@section('title', 'Editar Marca')

@section('content_header')
    <h1>Editar Marca: {{ $marca->nombre }}</h1>
    <a class="d-flex justify-content-end align-items-center text-secondary px-4 w-50 mx-auto" style="font-size: 1.2rem; gap: 1rem;"
        href="{{ route('admin.marcas.index') }}">
        <i class="bi bi-arrow-left"></i>
        Regresar
    </a>
@endsection

@section('content')
    <main>

        <form
            action="{{ route('admin.marcas.update', $marca->id) }}"
            method="POST"
            class="w-50 mx-auto">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="marca">Nombre de la marca</label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" value="{{ old('marca', $marca->nombre) }}">
                @error('marca')
                    <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Guardar cambios
            </button>
        </form>
    </main>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">
@endsection

@section('js')
@endsection