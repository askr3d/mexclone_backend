<?php

namespace App\Repository;

use App\Interfaces\IMarcaRepository;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Collection;

class MarcaRepository implements IMarcaRepository{
    public function getMarcaById(int $id): Marca{
        return Marca::find($id);
    }
    public function getAllMarcas(): Collection{
        return Marca::all();
    }
    public function create(array $data): Marca{
        $marca = Marca::create([
            'nombre' => $data['marca']
        ]);

        return $marca;
    }
    public function update(int $id, array $data): Marca{
        $marca = $this->getMarcaById($id);
        $marca->update([
            'nombre' => $data['marca']
        ]);

        return $marca;
    }
    public function delete(int $id): Bool{
        $marca = $this->getMarcaById($id);
        return $marca->delete();
    }
}