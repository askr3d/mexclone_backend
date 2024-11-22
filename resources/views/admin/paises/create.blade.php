@extends('adminlte::page')

@section('title', 'Crear Pais')

@section('content_header')
    <h1>Nuevo País</h1>
    <a class="d-flex justify-content-end align-items-center text-secondary px-4 w-50 mx-auto" style="font-size: 1.2rem; gap: 1rem;"
        href="{{ route('admin.paises.index') }}">
        <i class="bi bi-arrow-left"></i>
        Regresar
    </a>
@endsection

@section('content')
    <main>
        @if(session()->has('warning'))
            <div class="alert alert-warning text-center" role="alert">
                {{ session()->get('warning') }}
            </div>
        @endif


        <form
            action="{{ route('admin.paises.store') }}"
            method="POST"
            class="w-50 mx-auto">
            @csrf
            <div class="form-group">
              <label for="nombre">Nombre del pais</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('value') }}">
              @error('nombre')
                  <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Crear
            </button>
        </form>
    </main>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">
@endsection

@section('js')

@endsection