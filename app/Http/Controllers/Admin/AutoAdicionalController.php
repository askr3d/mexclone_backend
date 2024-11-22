<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IAdicionalRepository;
use App\Interfaces\IAutoAdicionalRepository;
use App\Interfaces\IAutoRepository;
use App\Models\Auto;
use Illuminate\Http\Request;

class AutoAdicionalController extends Controller
{
    protected $autoRepository;
    protected $adicionalRepository;
    protected $autoAdicionalRepository;
    public function __construct(
        IAutoRepository $autoRepository,
        IAdicionalRepository $adicionalRepository,
        IAutoAdicionalRepository $autoAdicionalRepository
    ) {
        $this->autoRepository = $autoRepository;
        $this->adicionalRepository = $adicionalRepository;
        $this->autoAdicionalRepository = $autoAdicionalRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'auto_id' => '',
            'concepto' => '',
            'porcentaje' => ''
        ]);

        if($this->autoAdicionalRepository->alreadyExists($validated['auto_id'], $validated['concepto'])){
            return response()->json("Este adicional ya ha sido agregado", 500);
        }

        $adicional = $this->autoAdicionalRepository->create($validated);
        $adicional = $this->autoAdicionalRepository->getAutoAdicionalWithAdicionales($adicional->id);
        return response()->json($adicional);
    }

    public function show(Auto $auto)
    {
        $adicionales = $this->adicionalRepository->getAllAdicionales();
        $auto = $this->autoRepository->getAllAutoAdicionalesWithConcepto($auto->id);
        return view("admin.autoAdicionales.show", compact("auto", "adicionales"));
    }

    public function edit(Auto $auto)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
