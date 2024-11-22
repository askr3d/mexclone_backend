<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IAutoRepository;
use App\Interfaces\ICiudadRepository;
use App\Interfaces\IMarcaRepository;
use App\Interfaces\IModeloRepository;
use App\Interfaces\IPaisRepository;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    protected $autoRepository;
    protected $marcaRepository;
    protected $modeloRepository;
    protected $ciudadRepository;
    protected $paisRepository;

    public function __construct(
        IAutoRepository $autoRepository,
        IMarcaRepository $marcaRepository,
        IModeloRepository $modeloRepository,
        ICiudadRepository $ciudadRepository,
        IPaisRepository $paisRepository
    ) {
        $this->autoRepository = $autoRepository;
        $this->marcaRepository = $marcaRepository;
        $this->modeloRepository = $modeloRepository;
        $this->ciudadRepository = $ciudadRepository;
        $this->paisRepository = $paisRepository;
    }
    public function index(){
        $autos = $this->autoRepository->getAllAutos();
        return view("admin.autos.index", [
            'autos' => $autos
        ]);
    }

    public function create(){
        $marcas = $this->marcaRepository->getAllMarcas();
        $modelos = $this->modeloRepository->getAllModelosGroupByMarcaForInputs();
        $paises = $this->paisRepository->getAllPaises();
        $ciudades = $this->ciudadRepository->getAllModelosGroupByMarcaForInputs();
        $estados = $this->autoRepository->getAllEstados();

        return view('admin.autos.create', compact('marcas', 'modelos', 'paises', 'ciudades', 'estados'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'placas' => 'required|unique:autos,placas',
            'precio_por_dia' => 'required|numeric',
            'precio_total' => 'required|numeric',
            'ciudad' => 'required',
            'modelo' => 'required',
            'estado' => 'required',
        ]);

        $this->autoRepository->create($validated);

        return redirect()->route("admin.autos.index")
                ->with('success',"Auto agregado correctamente");
    }

    public function edit(int $id){
        $auto = $this->autoRepository->getAutoById($id);
        $marcas = $this->marcaRepository->getAllMarcas();
        $modelos = $this->modeloRepository->getAllModelosGroupByMarcaForInputs();
        $paises = $this->paisRepository->getAllPaises();
        $ciudades = $this->ciudadRepository->getAllModelosGroupByMarcaForInputs();
        $estados = $this->autoRepository->getAllEstados();

        return view("admin.autos.edit", compact([
            'auto',
            'marcas',
            'modelos',
            'paises',
            'ciudades',
            'estados'
        ]));
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'placas' => 'required|unique:autos,placas,'.$id,
            'precio_por_dia' => 'required|numeric',
            'precio_total' => 'required|numeric',
            'ciudad' => 'required',
            'modelo' => 'required',
            'estado' => 'required',
        ]);

        $this->autoRepository->update($id, $validated);

        return redirect()->route("admin.autos.index")
                ->with('success',"Auto actualizado correctamente");
    }

    public function destroy(int $id){
        return response()->json($this->autoRepository->delete($id));
    }
}
