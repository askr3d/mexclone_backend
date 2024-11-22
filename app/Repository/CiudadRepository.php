<?php

namespace App\Repository;

use App\Interfaces\ICiudadRepository;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Collection;

class CiudadRepository implements ICiudadRepository{
    public function getCiudadById(int $id): Ciudad{
        return Ciudad::find( $id );
    }
    public function getAllCiudades(): Collection{
        return Ciudad::with('pais')->get();
    }

    public function getAllModelosGroupByMarcaForInputs(): Collection{
        $ciudades = Ciudad::with('pais')
                    ->select('id', 'nombre', 'pais_id')
                    ->get();
        return $ciudades->groupBy('pais_id');
    }
    public function create(array $data): Ciudad{
        $ciudad = Ciudad::create([
            'nombre' => $data['nombre'],
            'abreviatura' => $data['abreviatura'],
            'pais_id' => $data['pais'],
        ]);

        return $ciudad;
    }
    public function update(int $id, array $data): Ciudad{
        $ciudad = $this->getCiudadById( $id );

        $ciudad->update([
            'nombre' => $data['nombre'],
            'abreviatura' => $data['abreviatura'],
            'pais_id' => $data['pais'],
        ]);

        return $ciudad;
    }
    public function delete(int $id): Bool{
        $ciudad = $this->getCiudadById( $id );

        return $ciudad->delete();
    }
}