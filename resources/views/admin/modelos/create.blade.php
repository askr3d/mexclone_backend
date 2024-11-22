@extends('adminlte::page')

@section('title', 'Crear Modelo')

@section('content_header')
    <h1>Nuevo Modelo</h1>
    <a class="d-flex justify-content-end align-items-center text-secondary px-4 w-50 mx-auto" style="font-size: 1.2rem; gap: 1rem;"
        href="{{ route('admin.modelos.index') }}">
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
            action="{{ route('admin.modelos.store') }}"
            method="POST"
            class="w-50 mx-auto">
            @csrf
            <div class="form-group">
              <label for="modelo">Nombre del modelo</label>
              <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="{{ old('modelo') }}">
              @error('modelo')
                  <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label for="marca">Marca del modelo</label>
                <select class="form-control" id="marca" name="marca">
                    <option value="" selected>-- Seleccione la marca --</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                @error('marca')
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