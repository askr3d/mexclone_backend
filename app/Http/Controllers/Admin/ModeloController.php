<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IMarcaRepository;
use App\Interfaces\IModeloRepository;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    protected $modeloRepository;
    protected $marcaRepository;
    public function __construct(
        IModeloRepository $modeloRepository,
        IMarcaRepository $marcaRepository
    ) {
        $this->modeloRepository = $modeloRepository;
        $this->marcaRepository = $marcaRepository;
    }
    public function index(){
        $modelos = $this->modeloRepository->getAllModelos();
        return view("admin.modelos.index", compact('modelos'));
    }

    public function create(){
        $marcas = $this->marcaRepository->getAllMarcas();

        if($marcas->count() > 0){
            return view('admin.modelos.create', compact('marcas'));
        }else{
            return redirect()->route('admin.marcas.create')
                    ->with('warning', 'Para agregar un modelo, debe de agregar al menos una marca de auto');
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'modelo' => 'required|unique:modelos,nombre',
            'marca' => 'required'
        ]);

        $this->modeloRepository->create($validated);

        return redirect()->route('admin.modelos.index')
                ->with('success','Modelo creado exitosamente');
    }

    public function edit(int $id){
        $modelo = $this->modeloRepository->getModeloById($id);
        $marcas = $this->marcaRepository->getAllMarcas();

        return view('admin.modelos.edit', compact(['modelo', 'marcas']));
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'modelo' => 'required|unique:modelos,nombre,'.$id,
            'marca' => 'required'
        ]);

        $this->modeloRepository->update($id, $validated);

        return redirect()->route("admin.modelos.index")
                ->with("success","Modelo actualizado correctamente");
    }

    public function destroy(int $id){
        return response()->json($this->modeloRepository->delete($id));
    }
}
