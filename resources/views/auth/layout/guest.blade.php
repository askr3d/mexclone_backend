<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MexClone</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">

    </head>
    <body class="antialiased">

        <main class="mx-auto" style="height: 100vh; width: 80%; padding: 3%;">
            <div class="d-flex h-100 shadow-lg">
                <div
                    class="d-flex flex-column justify-content-center align-items-center gap-2 w-50 rounded-left"
                    style="background-color: #0F0F0F;">
                    <img class="w-50" src="https://mexrentacar.com//img/logo.svg" alt="Mexrentacar logo">
                    <h3 class="fs-6 text-center fw-light text-white p-5">
                        Mex Rent a Car ofrece a sus clientes una amplia red de centros de atención ubicados estratégicamente en las principales ciudades, aeropuertos, áreas turísticas y zonas urbanas de la República Mexicana, así como de otros países.
                    </h3>
                </div>
                <div class="d-flex flex-column text-white w-50 p-5" style="background-color: #1D4793;">
                    @yield('contenido')
                </div>
            </div>
        </main>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
