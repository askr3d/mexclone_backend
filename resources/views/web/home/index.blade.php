@extends('web.layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/app/home/style.css') }}">
@endsection

@section('contenido')
    {{-- Header --}}
    <div id="carouselExampleAutoplaying" class="carousel slide position-relative carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner" style="min-height: 600px;">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/sliders/slider1.jpg') }}" class="d-block w-100" style="height: 850px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/sliders/slider2.jpg') }}" class="d-block w-100" style="height: 850px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/sliders/slider3.jpg') }}" class="d-block w-100" style="height: 850px" alt="...">
            </div>
        </div>
        <div class="line-bottom-slider z-2" style="background-image: url({{asset('assets/img/header/line-bottom-slider.png')}})">
        </div>
        {{-- Busqueda y Promocion --}}
        <div class="d-flex gap-4 flex-column position-absolute z-1 w-50 start-50 translate-middle" style="height: 400px; top: 35%">
            <form class="d-flex flex-column gap-2" action="">
                {{-- Entrega --}}
                <div class="d-flex m-0 bg-white border border-dark-primary rounded py-2 px-4">
                    <div class="d-flex flex-column align-items-start text-dark-primary flex-grow-1">
                        <label class="w-100" for="entrega">Entrega</label>
                        <input
                            id="entrega"
                            class="border-0 border-focus-none px-1 w-100"
                            placeholder="Recoge tu vehiculo"
                            type="text">
                    </div>
                    <button class="btn d-flex align-items-center text-dark-primary gap-1" style="font-weight: 400; color: #12428A !important">
                        <i class="bi bi-chevron-double-left fs-5"></i>
                        <p class="m-0">Diferente Devolución</p>
                    </button>
                </div>

                {{-- Fechas y buscar --}}
                <div class="d-flex justify-content-between gap-4">
                    <div class="d-flex gap-3 justify-content-center m-0 bg-white border border-dark-primary rounded py-1 px-4">
                        <div class="d-flex flex-column">
                            <label for="recogida">Fecha de recogida</label>
                            <input class="form-control border-0 border-focus-none" type="datetime" name="recogida" id="recogida" placeholder="dd/mm/aaaa">
                        </div>
                        <div class="h-100 border border-secondary"></div>
                        <div class="d-flex flex-column">
                            <label for="devolucion">Fecha de devolución</label>
                            <input class="form-control border-0 border-focus-none" type="datetime" name="devolucion" id="devolucion" placeholder="Fecha de devolucion">
                        </div>
                    </div>
                    <button class="btn fs-5 py-2 px-5 text-white flex-grow-1 fw-bold" style="background-color: #006FB5">
                        Buscar
                    </button>
                </div>
            </form>
            <form>
                {{-- Codigo descuento --}}
                <div class="d-flex justify-content-between gap-2">
                    <div class="d-flex align-items-center justify-content-center m-0 bg-white border border-dark-primary rounded py-2 px-4 w-100">
                        <i class="bi bi-tags-fill fs-2" style="color: #f59e0b"></i>
                        <input class="fs-5 border-0 border-focus-none flex-grow-1 text-center" type="text" id="descuento" placeholder="¿Tienes un código de descuento? Anótalo aquí">
                    </div>
                </div>
            </form>
            <div class="mx-auto" style="width: 80%">
                {{-- Promocion --}}
                <img src="{{ asset('assets/img/info/descuento.svg') }}" alt="Promocion">
            </div>
        </div>
    </div>

    {{-- Main --}}
    <div class="d-flex flex-column gap-5 text-brand-primary align-items-center z-3 position-relative" style="margin-top: -80px;">
        <div class="text-center">
            <h3 class="text-uppercase">Descubre</h3>
            <p class="fs-6">#NosotrosTeMovemos</p>

            <p class="text-dark w-75 mx-auto">
                Todas nuestras tarifas en México incluyen cobertura contra daños a terceros y protección al auto con deducible. Descubre todas las opciones de autos que tenemos para ti.
            </p>

            <p class="fw-bold" style="color: #434343">
                Vive la experiencia Mex Rent A Car.
            </p>
        </div>
        <div class="d-flex gap-5 mt-4 flex-column align-items-center w-100">
            <h3 class="text-color-subtitle text-uppercase">Requisitos de Contratación</h3>

            <div class="row gap-3 text-dark" style="width: 70%">
                <div class="col d-flex gap-3 align-items-center flex-column">
                    <img class="img-fluid w-25" src="{{ asset('assets/img/icons/identificacion.svg') }}" alt="">
                    <div class="d-flex flex-column text-center">
                        <p class="fs-5 fw-bold text-color-subtitle">Información oficial</p>
                        <p style="font-size: .85rem">Pasaporte o INE vigentes durante el período del contrato de arrendamiento.</p>
                    </div>
                </div>
                <div class="col d-flex gap-3 align-items-center flex-column">
                    <img class="img-fluid w-25" src="{{ asset('assets/img/icons/licencia.svg') }}" alt="">
                    <div class="d-flex flex-column text-center">
                        <p class="fs-5 fw-bold text-color-subtitle">Licencia de conducir</p>
                        <p style="font-size: .85rem">Pasaporte o INE vigentes durante el período del contrato de arrendamiento.</p>
                    </div>
                </div>
                <div class="col d-flex gap-3 align-items-center flex-column">
                    <img class="img-fluid w-25" src="{{ asset('assets/img/icons/tarjeta.svg') }}" alt="">
                    <div class="d-flex flex-column text-center">
                        <p class="fs-5 fw-bold text-color-subtitle">Tarjeta de crédito</p>
                        <p style="font-size: .85rem">Pasaporte o INE vigentes durante el período del contrato de arrendamiento.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Conoce mas acerca de --}}
        <div class="conoce-mas-section py-5 my-5 w-100">
            <div class="conoce-mas-section-main row justify-content-center gap-5 mx-auto my-5 py-5" style="width: 80%">
                <div class="col">
                    <div class="d-flex flex-column">
                        <h2 style="font-size: 2rem;">Conoce las ventajas de rentar un auto con Mex</h2>
                        <p>Donde sea que estés, nuestra cobertura y servicios van contigo con la garantía Mex Rent A Car.</p>
                        <a class="text-uppercase btn text-white bg-dark-primary mt-3 py-2 mx-auto" href="#" style="min-width: 50%">
                            Conoce más de mex
                        </a>
                    </div>
                </div>
                <div class="col d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-4 justify-content-center w-100">
                        <div class="d-flex w-25">
                            <img src="{{ asset('assets/img/conoce/kilometraje.svg') }}" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <p style="color: #f1f1f1" class="fw-bold m-0">Kilometraje Ilimitado en todos tus viajes</p>

                            <p>
                                Sin límite de kilometraje en tu renta, disfruta del recorrido sin importar la distancia.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-4 justify-content-center">
                        <div class="d-flex w-25">
                            <img style="width: 80%" src="{{ asset('assets/img/conoce/deposito.svg') }}" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <p style="color: #f1f1f1" class="fw-bold m-0">Los depósitos más bajos en México</p>

                            <p>
                                Con la garantía y seguridad MEX, renta la mejor gama de autos con la mejor tarifa.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-4 justify-content-center">
                        <div class="d-flex w-25">
                            <img src="{{ asset('assets/img/conoce/variedad.svg') }}" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <p style="color: #f1f1f1" class="fw-bold m-0">Variedad de marcas y modelos</p>

                            <p>
                                Siempre disponibles, para todas las necesidades, conoce todo nuestro catálogo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Oficinas --}}

        <div class="d-flex flex-column align-items-center w-100">
            <h2 class="fs-2">Con más de 40 destinos por conocer</h2>
            <p class="text-dark-primary">Amplia cobertura en destinos estratégicos.</p>

            <div class="row gap-4 w-75 mt-5">
                <a class="col position-relative p-0 z-2" href="#">
                    <div class="card-office overflow-hidden z-1">
                        <div class="w-100" style="background-image: linear-gradient(rgba(255, 255, 255, 0) 50%, rgb(255, 255, 255) 80%), url('{{ asset('assets/img/offices/office1.png') }}');">
                        </div>
                    </div>

                    <p class="card-title text-color-subtitle bg-white w-100 position-relative z-2">
                        Sofia Aeropuerto
                    </p>
                </a>
                <a class="col position-relative p-0 z-2" href="#">
                    <div class="card-office overflow-hidden">
                        <div class="w-100" style="background-image: linear-gradient(rgba(255, 255, 255, 0) 50%, rgb(255, 255, 255) 80%), url('{{ asset('assets/img/offices/office2.png') }}');">
                        </div>
                    </div>

                    <p class="card-title text-color-subtitle bg-white w-100 position-relative z-2">
                        La Paz Centro
                    </p>
                </a>
                <a class="col position-relative p-0 z-2" href="#">
                    <div class="card-office overflow-hidden">
                        <div class="w-100" style="background-image: linear-gradient(rgba(255, 255, 255, 0) 50%, rgb(255, 255, 255) 80%), url('{{ asset('assets/img/offices/office3.png') }}');">
                        </div>
                    </div>

                    <p class="card-title text-color-subtitle bg-white w-100 position-relative z-2">
                        Malta Aeropuerto
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/app/home/script.js') }}"></script>
@endsection
