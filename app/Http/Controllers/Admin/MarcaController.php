<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IMarcaRepository;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    protected $marcaReposityory;
    public function __construct(
        IMarcaRepository $marcaRepository
    ) {
        $this->marcaReposityory = $marcaRepository;
    }
    public function index(){
        $marcas = $this->marcaReposityory->getAllMarcas();
        return view("admin.marcas.index", [
            'marcas' => $marcas
        ]);
    }

    public function create(){
        return view("admin.marcas.create");
    }

    public function store(Request $request){
        $validated = $request->validate([
            'marca' => 'required|unique:marcas,nombre'
        ]);

        $this->marcaReposityory->create($validated);

        return redirect()->route("admin.marcas.index")->with('success','Marca añadida exitosamente');
    }

    public function edit(int $id){
        $marca = $this->marcaReposityory->getMarcaById($id);

        return view('admin.marcas.edit', compact('marca'));
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'marca' => 'required|unique:marcas,nombre,'.$id
        ]);

        $this->marcaReposityory->update($id, $validated);

        return redirect()->route("admin.marcas.index")
                ->with('success','Marca actualizada exitosamente');
    }

    public function destroy(int $id){
        return response()->json($this->marcaReposityory->delete($id));
    }
}
