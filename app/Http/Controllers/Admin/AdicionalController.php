<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IAdicionalRepository;
use Illuminate\Http\Request;

class AdicionalController extends Controller
{
    protected $adicionalRepository;
    public function __construct(
        IAdicionalRepository $adicionalRepository
    ) {
        $this->adicionalRepository = $adicionalRepository;
    }
    public function index(){
        $adicionales = $this->adicionalRepository->getAllAdicionales();
        return view("admin.adicionales.index", compact('adicionales'));
    }

    public function create(){
        return view('admin.adicionales.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'concepto' => 'required|unique:adicionales',
            'porcentaje' => 'required|numeric'
        ]);

        $this->adicionalRepository->create($validated);

        return redirect()->route('admin.adicionales.index')
                ->with('success','Adicional agregado correctamente');
    }

    public function edit(int $id){
        $adicional = $this->adicionalRepository->getAdicionalById($id);
        return view('admin.adicionales.edit', compact('adicional'));
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'concepto' => 'required|unique:adicionales,concepto,'.$id,
            'porcentaje' => 'required|numeric'
        ]);

        $this->adicionalRepository->update($id, $validated);

        return redirect()->route('admin.adicionales.index')
                ->with('success','Adicional agregado correctamente');
    }

    public function destroy(int $id){
        return response()->json($this->adicionalRepository->delete($id));
    }
}
