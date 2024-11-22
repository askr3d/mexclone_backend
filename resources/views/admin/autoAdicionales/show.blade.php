@extends('adminlte::page')


@section('title', 'Auto Adicionales')

@section('content_header')
    <h1>Auto - Adicionales: {{ $auto->placas }} - {{ $auto->modelo->marca->nombre }} {{ $auto->modelo->nombre }}</h1>
@endsection

@section('content')
    <main class="d-flex justify-content-center mt-4" style="gap: 4rem;">
        <div class="card w-25 shadow">
            <img src="https://img.remediosdigitales.com/dd1167/2021-honda-civic-type-r-limited-edition-6/1366_521.jpg" class="card-img-top" alt="..." style="object-fit: fill; height: 28vh; width: 28vh,">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between">Precio <span>$@currencyConvert($auto->precio_total)</span></li>
              <li class="list-group-item d-flex justify-content-between">Añadido <span>$0</span></li>
              <li class="list-group-item d-flex justify-content-between">IVA <span>$0</span></li>
              <li class="list-group-item d-flex justify-content-between">Total <span>$@currencyConvert($auto->precio_total)</span></li>
            </ul>
        </div>
        <div class="w-50">
            <button
                type="button"
                data-toggle="modal" data-target="#addAdicionalModal"
                class="btn btn-primary d-flex align-items-center justify-content-center w-100" style="gap: .8rem;">
                <i class="bi bi-plus-circle"></i>
                Agregar Adicional
            </button>
            <table id="tablaAdicionales" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Concepto</th>
                        <th>Porcentaje por día</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="addAdicionalModal" tabindex="-1" aria-labelledby="addAdicionalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                Añadir Adicional
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <div class="modal-body">
                <form id="formAutoAdicional" action="{{ route('admin.autos.adicionales.store') }}">
                    <div class="row">
                        <div class="form-group col-8">
                          <label for="concepto">Concepto</label>
                          <select id="concepto" name="concepto"  class="form-control" required>
                            <option value="" selected>Seleccione un concepto</option>
                            @foreach ($adicionales as $adicional)
                                <option value="{{ $adicional->id }}" data-porcentaje="{{ $adicional->porcentaje_por_dia }}">{{ $adicional->concepto }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-4">
                          <label>Porcentaje %</label>
                          <input
                                value="0"
                                type="numeric" disabled step="0.01"
                                class="form-control text-right" id="porcentaje">
                        </div>
                    </div>
            </div>

                    <div class="modal-footer">
                        <button id="btnAutoAdicional" type="submit" class="btn btn-primary"><i class="bi bi-plus" style="font-size: 1.2rem;"></i></button>
                    </div>
                </form>
        </div>
        </div>
    </div>
    {{-- <main class="d-flex flex-column align-items-end container" style="gap: 2rem;">
        <div>
            <a
                href="{{ route('admin.adicionales.create') }}"
                class="btn btn-primary d-flex align-items-center" style="gap: .8rem; font-size: 1.2rem">
                <i class="bi bi-plus-circle" style="font-size: 1.3rem"></i>
                Agregar Adicional
            </a>
        </div>

        <div class="w-100">
            <table id="tablaAdicionales" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Concepto</th>
                        <th>Porcentaje por día</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main> --}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/bicons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ mix('css/datatable.css') }}">
    <link rel="stylesheet" href="{{ mix('css/toasty.css') }}">
@endsection

@section('js')
<script src="{{ mix('js/datatable.js') }}"></script>
<script src="{{ mix('js/sweetalert.js') }}"></script>
<script src="{{ mix('js/toasty.js') }}"></script>

<script>
    const toast = new Toasty(toastyOptions);

    @if(session()->has('success'))

        toast.success("{{ session()->get('success') }}");
    @endif

    const data = {!! json_encode($auto->auto_adicionales) !!};
    const adicionalesData = {!! json_encode($adicionales) !!};
    const auto_id = {!! json_encode($auto->id) !!}
    // console.log(data);

    // console.log(data);

    document.addEventListener('DOMContentLoaded', () => {
        updateCostoConcepto();
        submitAdicionalConfig();
    });

    const monedaFormat = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });


    const tablaAdicionales = new DataTable("#tablaAdicionales", {
        data,
        columns: [
            { data: 'id' },
            { data: 'adicional.concepto' },
            { data: 'porcentaje_por_dia' },
            {
                data: 'id',
                render: (data, type, row) => {
                    let ruta = "{{ route('admin.adicionales.edit', 'sustituir' ) }}";
                    ruta = ruta.replace("sustituir", data);

                    return `
                        <div class="d-flex justify-content-center" style="gap: 2rem">
                            <a
                                href="${ruta}"
                                class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                                Editar
                            </a>
                            <button onclick="eliminarRegistro(${data})" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                                Eliminar
                            </button>
                        </div>
                    `
                }
            }
        ],
        columnDefs: [
            {
                'targets': '_all',
                'className': 'text-center'
            }
        ]
    });

    const eliminarRegistro = (id) => {
        Swal.fire({
            title: "¿Estas seguro?",
            text: "El registro "+ id +" sera eliminado",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "SI, eliminar"
        }).then((result) => {
                if (result.isConfirmed) {
                    let ruta = "{{ route('admin.autos.adicionales.destroy', 'sustituir' ) }}";
                    ruta = ruta.replace("sustituir", id);

                    fetch(ruta, {
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if(!response.ok) new Throw('Error');
                        return response.json();
                    })
                    .then(async(data) => {
                        await Swal.fire({
                            title: "!Eliminado!",
                            text: "El registro ha sido eliminado exitosamente",
                            icon: "success"
                        });

                        location.reload();
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Intentelo más tarde",
                            text: "No se ha podido eliminar el registro",
                            icon: "error"
                        });
                    });
            }
        });
    }

    const updateCostoConcepto = () => {
        const concepto = document.querySelector('#concepto');
        const porcentaje = document.querySelector('#porcentaje');

        concepto.addEventListener('change', ({ target:{ value: id } }) => {
            if(id==0){
                porcentaje.value = 0;
                return;
            }
            const {porcentaje_por_dia: porcentaje_pd} = adicionalesData.find(a => a.id == id);
            porcentaje.value = porcentaje_pd;
        });
    }

    const submitAdicionalConfig = () => {
        const formAutoAdicional = document.querySelector('#formAutoAdicional');
        const btnAutoAdicional = document.querySelector('#btnAutoAdicional');
        const modal = $('#addAdicionalModal');

        formAutoAdicional.addEventListener('submit', (e) => {
            e.preventDefault();
            btnAutoAdicional.setAttribute('disabled', '');

            const ruta = formAutoAdicional.action;
            const { concepto: {value: concepto}, porcentaje: { value: porcentaje } } = formAutoAdicional.elements;

            const data = {
                concepto,
                porcentaje,
                auto_id
            }

            fetch(ruta, {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if(!response.ok) throw new Error('exists');

                return response.json()
            })
            .then(async(data) => {
                await modal.modal('hide');
                tablaAdicionales.row.add({...data});
                tablaAdicionales.draw();
                toast.success("Adicional agregado correctamente");
            })
            .catch(error => {
                if(error.message  == 'exists'){
                    Swal.fire({
                        title: "Ya existe",
                        text: "Este adicional ya esta agregado",
                        icon: "error"
                    });
                }else{
                    Swal.fire({
                        title: "Intentelo más tarde",
                        text: "No se ha podido añadir el adicional",
                        icon: "error"
                    });
                }

            })
            .finally(() => {

                btnAutoAdicional.removeAttribute('disabled');
            });
        });
    }


</script>
@endsection