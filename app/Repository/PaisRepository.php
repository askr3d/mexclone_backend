<?php

namespace App\Repository;

use App\Interfaces\IPaisRepository;
use App\Models\Pais;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\array;

class PaisRepository implements IPaisRepository{
    public function getPaisById(int $id): Pais{
        return Pais::find($id);
    }
    public function getAllPaises(): Collection{
        return Pais::all();
    }
    public function create(array $data): Pais{
        $pais = Pais::create([
            'nombre' => $data['nombre']
        ]);
        return $pais;
    }

    public function update(int $id, array $data): Pais{
        $pais = $this->getPaisById( $id );

        $pais->update([
            'nombre' => $data['nombre']
        ]);

        return $pais;
    }
    public function delete(int $id): Bool{
        $pais = $this->getPaisById( $id );

        return $pais->delete();
    }
}