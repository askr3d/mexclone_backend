<?php

namespace App\Repository;

use App\Interfaces\IAutoRepository;
use App\Models\AEstado;
use App\Models\Auto;
use Illuminate\Database\Eloquent\Collection;

class AutoRepository implements IAutoRepository{
    public function getAutoById(int $id): Auto{
        return Auto::find($id);
    }
    public function getAllAutos(): Collection{
        return Auto::with(['estado',
        'ciudad' => function($query){
            $query->with('pais');
        },
        'modelo' => function($query){
            $query->with('marca');
        }
        ])->get();
    }
    public function getAllAutoAdicionalesWithConcepto(int $id): Auto{
        return Auto::with([
            'auto_adicionales' => function($query){
                $query->with('adicional');
            }
        ])->find($id);
    }
    public function getAllEstados(): Collection{
        return AEstado::all();
    }
    public function create(array $data): Auto{
        $auto = Auto::create([
            'placas' => $data['placas'],
            'precio_por_dia' => $data['precio_por_dia'],
            'precio_total' => $data['precio_total'],
            'ciudad_id' => $data['ciudad'],
            'modelo_id' => $data['modelo'],
            'autos_estado_id' => $data['estado']
        ]);

        return $auto;
    }
    public function update(int $id, array $data): Auto{
        $auto = $this->getAutoById($id);
        $auto->update([
            'placas' => $data['placas'],
            'precio_por_dia' => $data['precio_por_dia'],
            'precio_total' => $data['precio_total'],
            'ciudad_id' => $data['ciudad'],
            'modelo_id' => $data['modelo'],
            'autos_estado_id' => $data['estado']
        ]);
        return $auto;
    }

    public function delete(int $id): Bool{
        $auto = $this->getAutoById($id);
        return $auto->delete();
    }
}