<?php

namespace App\Repository;

use App\Interfaces\IModeloRepository;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Collection;

class ModeloRepository implements IModeloRepository{
    public function getModeloById(int $id): Modelo{
        return Modelo::find($id);
    }
    public function getAllModelos(): Collection{
        return Modelo::with('marca')->get();
    }
    public function create(array $data): Modelo{
        $modelo = Modelo::create([
            'nombre' => $data['modelo'],
            'marca_id' => $data['marca'],
        ]);

        return $modelo;
    }
    public function getAllModelosGroupByMarcaForInputs(): Collection{
        $modelos = Modelo::with('marca')
                    ->select('id', 'nombre', 'marca_id')
                    ->get();
        return $modelos->groupBy('marca_id');
    }
    public function update(int $id, array $data): Modelo{
        $modelo = $this->getModeloById($id);
        $modelo->update([
            'nombre' => $data['modelo'],
            'marca_id' => $data['marca'],
        ]);

        return $modelo;
    }
    public function delete(int $id): Bool{
        $modelo = $this->getModeloById($id);
        return $modelo->delete();
    }
}