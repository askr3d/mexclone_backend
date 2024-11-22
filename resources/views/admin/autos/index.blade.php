@extends('adminlte::page')


@section('title', 'Autos')

@section('content_header')
    <h1>Autos</h1>
@endsection

@section('content')
    <main class="d-flex flex-column align-items-end container" style="gap: 2rem">
        <div>
            <a
                href="{{ route('admin.autos.create') }}"
                class="btn btn-primary d-flex align-items-center" style="gap: .8rem; font-size: 1.2rem">
                <i class="bi bi-plus-circle" style="font-size: 1.3rem"></i>
                Agregar Auto
            </a>
        </div>

        <div class="w-100">
            <table id="tablaAutos" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio por día</th>
                        <th>Precio total</th>
                        <th>Modelo</th>
                        <th>Ciudad</th>
                        <th>Estado del auto</th>
                        <th>Adicionales</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
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

    @if(session()->has('success'))
        const toast = new Toasty(toastyOptions);

        toast.success("{{ session()->get('success') }}");
    @endif

    const data = {!! json_encode($autos) !!};
    // console.log(data);

    const monedaFormat = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });


    const tablaAutos = new DataTable("#tablaAutos", {
        data,
        columns: [
            { data: 'id' },
            { data: 'placas' },
            {
                data: 'precio_por_dia',
                render: (data, type, row) => {
                    return `${monedaFormat.format(data)}`;
                }
            },
            {
                data: 'precio_total',
                render: (data, type, row) => {
                    return `${monedaFormat.format(data)}`;
                }
            },
            {
                data: 'modelo.marca.nombre',
                render: (data, type, row) => {
                    return `${data} - ${row.modelo.nombre}`
                }
            },
            {
                data: 'ciudad.pais.nombre',
                render: (data, type, row) => {
                    return `${row.ciudad.nombre} - ${data}`
                }
            },
            { data: 'estado.nombre' },
            {
                data: 'id',
                render: (data, type, row) => {
                    let opcion;
                    if(row.adicionales != null){
                        opcion = `
                            <button
                                class="btn btn-info">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        `;
                    }else{
                        let ruta = "{{ route('admin.autos.adicionales.show', 'sustituir' ) }}";
                        ruta = ruta.replace("sustituir", row.placas);
                        opcion = `
                            <a href='${ruta}' role='button'>
                                <i class="bi bi-plus-square-dotted" style='font-size:1.2rem'></i>
                            </a>
                        `;
                    }

                    return opcion;
                }
            },
            {
                data: 'id',
                render: (data, type, row) => {
                    let ruta = "{{ route('admin.autos.edit', 'sustituir' ) }}";
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
                    let ruta = "{{ route('admin.autos.destroy', 'sustituir' ) }}";
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



</script>
@endsection