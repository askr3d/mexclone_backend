<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MexClone</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">

        @yield('styles')

    </head>
    <body class="antialiased w-100">
            <header id="layout-header" class="d-flex flex-column w-100">
                <nav class="d-flex justify-content-end pe-2" style="background-color: #f1f1f1">
                    <ul class="d-flex justify-content-end gap-4 container py-2 my-2" style="list-style: none">
                        <li class="nav-item">
                            <a href="tel:+523346242114">
                                <i class="bi bi-telephone-fill me-2"></i>
                                +52 (33) 4624 2114
                            </a>
                        </li>
                        <li
                            role="button"
                            class="nav-item fw-bolder text-gray-700">
                            Moneda: MXN
                            <i class="bi bi-chevron-down"></i>
                        </li>
                        <li
                            role="button"
                            class="nav-item fw-bolder text-gray-700">
                            English
                            <i class="bi bi-translate"></i>
                        </li>
                    </ol>
                </nav>
                <nav
                    class="px-5 navbar navbar-expand-lg bg-body-tertiary"
                    style="height: 60px; background-color: #006FB5 !important">
                    <div class="container-fluid container">
                        <div>
                            <a href="{{ route('home') }}">
                              <img
                                    class="logo-mexrentacar grow-animation position-absolute z-2"
                                    src="https://mexrentacar.com//img/logo.svg" alt="Mexrentacar logo">
                            </a>
                        </div>
                        <button class="navbar-toggler py-1 px-2 text-white border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi bi-list fs-2"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav gap-3 ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-lg text-white grow-animation" aria-current="page" href="#">
                                        Renta
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-lg text-white grow-animation" aria-current="page" href="#">
                                        Corporativos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-lg text-white grow-animation" aria-current="page" href="#">
                                        Blog
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-lg text-white grow-animation" aria-current="page" href="#">
                                        Ubiaciones
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-lg text-white grow-animation" aria-current="page" href="#">
                                        Contacta
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <main>
                @yield('contenido')
            </main>

            <footer class="d-flex flex-column bg-dark-primary">
                <div class="d-flex flex-column gap-3 mx-auto py-4" style="width: 80%">
                    <img style="max-width: 120px" src="{{ asset('assets/img/header/logo-footer.svg') }}" alt="">

                    <div class="d-flex justify-content-between m-0">
                        <ul class="row footer-lista-info p-0" style="list-style: none">
                            <a class="col-6 text-white" style="text-decoration: none">Aviso de Privacidad</a>
                            <a class="col-6 text-white" style="text-decoration: none">Conoce a Mex Rent a Car</a>
                            <a class="col-6 text-white" style="text-decoration: none">Nuestras ubicaciones</a>
                            <a class="col-6 text-white" style="text-decoration: none">Revisar mi Reservación</a>
                            <a class="col-6 text-white" style="text-decoration: none">Promociones Términos y Condiciones</a>
                            <a class="col-6 text-white" style="text-decoration: none">Mex Carga</a>
                            <a class="col-6 text-white" style="text-decoration: none">Preguntas Frecuentes</a>
                            <a class="col-6 text-white" style="text-decoration: none">Contactanos</a>
                            <a class="col-6 text-white" style="text-decoration: none">Términos y Condiciones</a>
                            <a class="col-6 text-white" style="text-decoration: none">Buscamos tu Talento</a>
                            <a class="col-6 text-white" style="text-decoration: none">Afiliados</a>
                        </ul>
                        <div class="me-5 pe-5">
                            <div class="d-flex gap-2" style="list-style: none">
                                <a class="text-white fs-3" target="_blank" href="https://www.facebook.com/MexRentACar"><i class="bi bi-facebook"></i></a>
                                <a class="text-white fs-3" target="_blank" href="https://www.instagram.com/mexrentacar/"><i class="bi bi-instagram"></i></a>
                                <a class="text-white fs-3" target="_blank" href="https://www.youtube.com/channel/UCoUUB1p2TWBE9svJUKjm53g"><i class="bi bi-youtube"></i></a>
                                <a class="text-white fs-3" target="_blank" href="https://x.com/MexRentACar?mx=2"><i class="bi bi-twitter-x"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="text-white">
                        <p>Dudas, quejas o sugerencias contáctanos a:</p>
                        <p class="my-1">
                            <i class="bi bi-telephone-fill me-2"></i>
                            +52 (33) 4624 2114 Servicio 24/7
                        </p>
                        <p class="my-1">
                            <i class="bi bi-envelope-fill me-2"></i>
                            customer.care@mexrentacar.com
                        </p>
                    </div>
                </div>
                <div class="bg-brand-primary py-4">
                    <div class="d-flex flex-column mx-auto text-white" style="width: 80%">
                        <p style="font-size: .8rem">Aceptamos</p>
                        <div class="row mx-auto justify-content-around" style="width: 80%">
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <img class="w-50" src="{{ asset('assets/img/metodos_pagos/visa-white.svg') }}" alt="">
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <img class="w-75" src="{{ asset('assets/img/metodos_pagos/mastercard-white.svg') }}" alt="">
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <img class="w-50" src="{{ asset('assets/img/metodos_pagos/amex-white.svg') }}" alt="">
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <img style="width: 30%" src="{{ asset('assets/img/metodos_pagos/jbc-white.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <p class="text-white text-center mt-5" style="font-size: .9rem">Av. Guadalupe No. 151 Int. No. A Chapalita. C.P. 44500 Guadalajara, Jal. MEX</p>
                </div>
            </footer>

        <script src="{{ mix('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
