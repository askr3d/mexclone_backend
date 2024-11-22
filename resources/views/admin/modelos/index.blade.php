@extends('adminlte::page')


@section('title', 'Modelo')

@section('content_header')
    <h1>Modelos</h1>
@endsection

@section('content')
    <main class="d-flex flex-column align-items-end container" style="gap: 2rem">

        <div>
            <a
                href="{{ route('admin.modelos.create') }}"
                class="btn btn-primary d-flex align-items-center" style="gap: .8rem; font-size: 1.2rem">
                <i class="bi bi-plus-circle" style="font-size: 1.3rem"></i>
                Agregar Modelo
            </a>
        </div>

        <div class="w-100">
            <table id="tablaModelos" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Marca</th>
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

    const data = {!! json_encode($modelos) !!};



    const tablaModelos = new DataTable("#tablaModelos", {
        data,
        columns: [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'marca.nombre' },
            { data: 'created_at' },
            {
                data: 'id',
                render: (data, type, row) => {
                    let ruta = "{{ route('admin.modelos.edit', 'sustituir' ) }}";
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
                    let ruta = "{{ route('admin.modelos.destroy', 'sustituir' ) }}";
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