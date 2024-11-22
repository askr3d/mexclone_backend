@extends('adminlte::page')

@section('title', 'Crear Adicional')

@section('content_header')
    <h1>Nuevo Adicional</h1>
    <a class="d-flex justify-content-end align-items-center text-secondary px-4 w-50 mx-auto" style="font-size: 1.2rem; gap: 1rem;"
        href="{{ route('admin.adicionales.index') }}">
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
            action="{{ route('admin.adicionales.store') }}"
            method="POST"
            class="w-50 mx-auto">
            @csrf
            <div class="form-group">
              <label for="concepto">Nombre del concepto</label>
              <input type="text" class="form-control" name="concepto" id="concepto" placeholder="Concepto" value="{{ old('concepto') }}">
              @error('concepto')
                  <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label for="porcentaje">Porcentaje por día</label>
                <input type="number" step="0.01" class="form-control" id="porcentaje" name="porcentaje" placeholder="Porcentaje" value="{{ old('porcentaje') }}"/>
                @error('porcentaje')
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