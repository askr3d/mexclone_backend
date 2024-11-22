@extends('auth.layout.guest')

@section('contenido')
    <h2 class="fw-normal">
        Iniciar Sesión
    </h2>


    <form
        class="d-flex flex-column mt-5 h-100"
        action="{{ route('login.store') }}"
        method="POST"
    >
        @csrf
        @if (session('mensaje'))
            <p class="text-center fw-bold" style="color: #ff4848">
                {{ session('mensaje') }}
            </p>
        @endif
        <div class="d-flex flex-column w-100">
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
        </div>
        <div class="d-flex gap-4 mt-5 w-75 mx-auto">
            <button class="btn px-5 py-2 fw-bolder" type="submit" style="background-color: #E7E7E7; color: #3176D1;">
                Ingresar
            </button>
            <a href="{{ route('register') }}" class="btn px-5 py-2 fw-bolder" type="submit" style="background-color: #000000; color: #ffffff;">
                Registrarse
            </a>
        </div>
    </form>
@endsection
