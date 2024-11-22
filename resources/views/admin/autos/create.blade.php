@extends('adminlte::page')

@section('title', 'Crear Auto')

@section('content_header')
    <h1>Nuevo Auto</h1>
    <a class="w-50 mx-auto d-flex justify-content-end align-items-center text-secondary px-4" style="font-size: 1.2rem; gap: 1rem;"
        href="{{ route('admin.autos.index') }}">
        <i class="bi bi-arrow-left"></i>
        Regresar
    </a>
@endsection

@section('content')
    <main class="py-4">
        <form
            action="{{ route('admin.autos.store') }}"
            method="POST"
            class="w-50 mx-auto">
            @csrf

            <div class="row">
                <div x-data="{ placas: '{{ old('placas') }}' }" class="form-group col-9">
                    <label for="placas">Placas</label>
                    <input
                        x-on:input="placas = placas.toUpperCase()" x-model="placas"
                        type="text" class="form-control" name="placas" id="placas" placeholder="Placas del auto">
                    @error('placas')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="estado">Estado del vehiculo</label>
                    <select class="form-control" name="estado" id="estado" value="{{ old('estado') }}">
                        <option value="">-- Estado --</option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                        @endforeach
                    </select>
                    @error('estado')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="precio_por_dia">Precio por día</label>
                    <input type="number" class="form-control" id="precio_por_dia" name="precio_por_dia" step="0.01" value='{{ old('precio_por_dia') }}' placeholder="Precio por día">
                    @error('precio_por_dia')
                        <p class="text-danger" style="font-size: .9rem">El campo Precio por dia es obligatorio</p>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="precio_total">Precio total</label>
                    <input type="number" class="form-control" id="precio_total" name="precio_total" step="0.01" value='{{ old('precio_total') }}' placeholder="Precio total">
                    @error('precio_total')
                    <p class="text-danger" style="font-size: .9rem">El campo Precio total es obligatorio</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-5" x-data="{ showCiudades: '{{ old('pais') }}' }">
                    <div class="form-group">
                        <label for="pais">Ciudad</label>
                        <select x-model='showCiudades' class="form-control" id="pais" name="pais">
                            <option id="paisDefault" value="" selected>-- Seleccione el país --</option>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                        @error('ciudad')
                            <p class="text-danger" style="font-size: .9rem">Debe seleccionar una ciudad</p>
                        @enderror
                    </div>
                    <div x-show="showCiudades.length > 0 && showCiudades != 0" class="form-group">
                        <select class="form-control" id="ciudad" name="ciudad">
                        </select>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-5" x-data="{ showModelos: '{{ old('marca') }}' }">
                    <label for="marca">Modelo del auto</label>
                    <div class="form-group">
                        <select x-model='showModelos' class="form-control" id="marca" name="marca">
                            <option id="marcaDefault" value="" selected>-- Seleccione la marca --</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                        @error('modelo')
                            <p class="text-danger" style="font-size: .9rem">Debe seleccionar un modelo</p>
                        @enderror
                    </div>
                    <div x-show="showModelos.length > 0" class="form-group">
                        <select class="form-control" id="modelo" name="modelo">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Crear
            </button>
        </form>
    </main>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">
    <script src="{{ mix('js/sweetalert.js') }}"></script>
@endsection

@section('js')
    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <script>
        const modelosData = {!! json_encode($modelos) !!};
        const ciudadesData = {!! json_encode($ciudades) !!};


        document.addEventListener('DOMContentLoaded', () => {
            selectMarcaConfig();
            selectPaisConfig();
        });

        const selectMarcaConfig= () => {
            selectDinamicConfig("marca", "modelo", modelosData, {
                message: 'Esta marca no cuenta con modelos',
                x_data: 'Modelos'
            });

            const oldModelo = {!! json_encode(old('modelo', null)) !!};
            const oldMarca = {!! json_encode(old('marca', null)) !!}
            if(oldModelo != null && oldMarca != null){
                searchSelects(
                    "marca",
                    "modelo",
                    modelosData,
                    oldModelo
                )
            }
        }

        const selectPaisConfig= () => {
            selectDinamicConfig("pais", "ciudad", ciudadesData, {
                message: 'Este país no tiene ciudades asociadas',
                x_data: 'Ciudades'
            });

            const oldCiudad = {!! json_encode(old('ciudad',null)) !!};
            const oldPais = {!! json_encode(old('pais',null)) !!};


            if(oldCiudad != null && oldPais != null){
                searchSelects(
                    "pais",
                    "ciudad",
                    ciudadesData,
                    oldCiudad
                )
            }
        }

        const selectDinamicConfig= (rootSelect, targetSelect, data, errorCase) => {
            const rootSelectInp = document.querySelector(`#${rootSelect}`);
            const targetSelectInp = document.querySelector(`#${targetSelect}`);

            rootSelectInp.addEventListener('change', async({target, target: { value: id } }) => {
                if(id > 0){
                    try {
                        const currentData = data[id];
                        targetSelectInp.innerHTML = '';
                        currentData.forEach(element => {
                            const optionTmp = document.createElement('option');
                            optionTmp.value = element.id;
                            optionTmp.innerText = element.nombre;
                            targetSelectInp.appendChild(optionTmp);
                        });
                    } catch (e) {
                        target.parentElement.parentElement._x_dataStack[0][`show${errorCase.x_data}`] = 0;
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: errorCase.message,
                        });
                    }
                }else{
                    targetSelectInp.value = 0;
                }
            });
        }

        const searchSelects = (rootSelect, targetSelect, data, target) => {
            const rootSelectInp = document.querySelector(`#${rootSelect}`);
            const targetSelectInp = document.querySelector(`#${targetSelect}`);

            const currentData = data[rootSelectInp.value];
            targetSelectInp.innerHTML = '';
            currentData.forEach(element => {
                const optionTmp = document.createElement('option');
                optionTmp.value = element.id;
                if(target == element.id){
                    optionTmp.setAttribute('selected', '')
                }
                optionTmp.innerText = element.nombre;
                targetSelectInp.appendChild(optionTmp);
            });
        }

    </script>
@endsection