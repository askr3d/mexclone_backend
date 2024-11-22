<?php

namespace App\Repository;

use App\Interfaces\IAdicionalRepository;
use App\Models\Adicional;
use Illuminate\Database\Eloquent\Collection;

class AdicionalRepository implements IAdicionalRepository{
    public function getAdicionalById(int $id): Adicional{
        return Adicional::find($id);
    }
    public function getAllAdicionales(): Collection{
        return Adicional::all();
    }
    public function create(array $data): Adicional{
        $adicional = Adicional::create([
            'concepto' => $data['concepto'],
            'porcentaje_por_dia' => $data['porcentaje'],
        ]);

        return $adicional;
    }
    public function update(int $id, array $data): Adicional{
        $adicional = $this->getAdicionalById($id);
        $adicional->update([
            'concepto' => $data['concepto'],
            'porcentaje_por_dia' => $data['porcentaje']
        ]);

        return $adicional;
    }
    public function delete(int $id): Bool{
        $adicional = $this->getAdicionalById($id);
        return $adicional->delete();
    }
}