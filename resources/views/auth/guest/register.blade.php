@extends('auth.layout.guest')

@section('contenido')
    <h2 class="fw-normal">
        Crear Cuenta
    </h2>

    <form
        class="d-flex flex-column mt-3 h-100"
        action="{{ route('register.store') }}"
        method="POST"
    >
        @csrf
        <div class="d-flex flex-column w-100">
            <div class="mb-3">
                <label for="name" class="form-label">
                    Nombre
                </label>
                <input id="name" name="name" type="name" class="form-control" placeholder="Cristian Millan">
                @error('name')
                    <p class="m-0" style="color: #ff4848">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">
                    Correo Electronico
                </label>
                <input id="email" name="email" type="email" class="form-control" placeholder="name@example.com">
                @error('email')
                    <p class="m-0" style="color: #ff4848">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Ingrese su contraseña">
                @error('password')
                    <p class="m-0" style="color: #ff4848">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Repetir Contraseña</label>
                <input id="password" name="password_confirmation" type="password" class="form-control">
            </div>
        </div>
        <div class="d-flex gap-4 mt-5 w-auto mx-auto">
            <button class="btn px-5 py-2 fw-bolder" type="submit" style="background-color: #E7E7E7; color: #3176D1;">
                Crear Cuenta
            </button>
            <a href="{{ route('login') }}" class="btn px-5 py-2 fw-bolder" type="submit" style="background-color: #000000; color: #ffffff;">
                Iniciar Sesión
            </a>
        </div>
    </form>
@endsection
