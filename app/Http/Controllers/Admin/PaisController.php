<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IPaisRepository;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public $paisRepository;

    public function __construct(
        IPaisRepository $paisRepository
    ) {
        $this->paisRepository = $paisRepository;
    }


    public function index(){
        $paises = $this->paisRepository->getAllPaises();
        return view("admin.paises.index", [
            'paises' => $paises
        ]);
    }

    public function create(){
        return view("admin.paises.create");
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required'
        ]);

        $this->paisRepository->create($validated);

        return redirect()->route('admin.paises.index')
                ->with('success','Pais creado exitosamente');
    }

    public function edit(int $id){
        $pais = $this->paisRepository->getPaisById($id);
        return view("admin.paises.edit", [
            'pais' => $pais
        ]);
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            "nombre"=> "required"
        ]);

        $this->paisRepository->update($id, $validated);

        return redirect()->route('admin.paises.index')
                ->with('success','Pais editado exitosamente');
    }

    public function destroy(int $id){
        return response()->json($this->paisRepository->delete($id));
    }
}
