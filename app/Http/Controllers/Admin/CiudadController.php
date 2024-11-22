<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ICiudadRepository;
use App\Interfaces\IPaisRepository;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    protected $ciudadRepository;
    protected $paisRepository;

    public function __construct(
        ICiudadRepository $ciudadRepository,
        IPaisRepository $paisRepository
    ) {
        $this->ciudadRepository = $ciudadRepository;
        $this->paisRepository = $paisRepository;
    }

    public function index(){
        $ciudades = $this->ciudadRepository->getAllCiudades();

        return view("admin.ciudades.index", [
            'ciudades' => $ciudades
        ]);
    }

    public function create(){
        $paises = $this->paisRepository->getAllPaises();

        if($paises->count() == 0){
            return redirect()->route('admin.paises.create')
                    ->with('warning', 'Para agregar una ciudad, debes agregar al menos un país');
        }else{
            return view('admin.ciudades.create', [
                'paises' => $paises
            ]);
        }

    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required',
            'abreviatura' => 'required|unique:ciudades',
            'pais' => 'required'
        ]);

        $this->ciudadRepository->create($validated);

        return redirect()->route('admin.ciudades.index')
                ->with('success','Ciudad creada exitosamente');
    }

    public function edit(int $id){
        $paises = $this->paisRepository->getAllPaises();
        $ciudad = $this->ciudadRepository->getCiudadById($id);

        return view('admin.ciudades.edit', [
            'ciudad' => $ciudad,
            'paises' => $paises
        ]);
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'nombre' => 'required',
            'abreviatura' => 'required|unique:ciudades,abreviatura,' . $id,
            'pais' => 'required'
        ]);

        $this->ciudadRepository->update($id, $validated);

        return redirect()->route('admin.ciudades.index')
                ->with('success','Ciudad actualizada exitosamente');
    }

    public function destroy(int $id){
        return response()->json($this->ciudadRepository->delete($id));
    }
}
