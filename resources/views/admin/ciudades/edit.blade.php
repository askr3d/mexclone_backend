@extends('adminlte::page')

@section('title', 'Editar Ciudad')

@section('content_header')
    <h1>Editar Ciudad: {{ $ciudad->nombre }}</h1>
    <a class="d-flex justify-content-end align-items-center text-secondary px-4 w-50 mx-auto" style="font-size: 1.2rem; gap: 1rem;"
        href="{{ route('admin.ciudades.index') }}">
        <i class="bi bi-arrow-left"></i>
        Regresar
    </a>
@endsection

@section('content')
    <main>
        <form
            action="{{ route('admin.ciudades.update', $ciudad->id) }}"
            method="POST"
            class="w-50 mx-auto">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nombre">Nombre de la ciudad</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Guadalajara" value="{{ old('value', $ciudad->nombre) }}">
              @error('nombre')
                  <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="abreviatura">Abreviatura de ciudad</label>
              <input type="text" class="form-control" name="abreviatura" id="abreviatura" placeholder="GDL" value="{{ old('value', $ciudad->abreviatura) }}">
              @error('abreviatura')
                  <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                <select class="form-control" id="pais" name="pais">
                    <option value="">-- Seleccione el país --</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}" {{ $pais->id == $ciudad->pais_id ? 'selected': ''}}>{{ $pais->nombre }}</option>
                    @endforeach
                </select>
                @error('pais')
                    <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Guardar Cambios
            </button>
        </form>
    </main>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">
@endsection

@section('js')

@endsection