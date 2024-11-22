<?php

namespace App\Repository;

use App\Interfaces\IAutoAdicionalRepository;
use App\Models\AutoAdicional;
use Illuminate\Database\Eloquent\Collection;

class AutoAdicionalRepository implements IAutoAdicionalRepository{
    public function getAutoAdicionalById(int $id): AutoAdicional{
        return AutoAdicional::find($id);
    }
    public function getAutoAdicionalWithAdicionales(int $id): AutoAdicional{
        return AutoAdicional::with('adicional')->find($id);
    }
    public function getAllAutoAdicionales(): Collection{
        return AutoAdicional::all();
    }
    public function alreadyExists(int $auto_id, int $adicional_id): Bool{
        $autoAdicional = AutoAdicional::where([
            'auto_id' => $auto_id,
            'adicional_id' => $adicional_id
        ])->first();

        return $autoAdicional != null;
    }
    public function create(array $data): AutoAdicional{

        $autoAdicional = AutoAdicional::create([
            'auto_id' => $data['auto_id'],
            'adicional_id' => $data['concepto'],
            'porcentaje_por_dia' => $data['porcentaje'],
        ]);

        return $autoAdicional;
    }
    public function update(int $id, array $data): AutoAdicional{
        $autoAdicional = $this->getAutoAdicionalById($id);
        $autoAdicional->update([
            'auto_id' => $data['auto'],
            'adicional_id' => $data['adicional'],
            'porcentaje_por_dia' => $data['porcentaje'],
        ]);

        return $autoAdicional;
    }
    public function delete(int $id): Bool{
        return $this->getAutoAdicionalById($id)->delete();
    }
}