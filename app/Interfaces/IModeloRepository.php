<?php

namespace App\Interfaces;

use App\Models\Modelo;
use Illuminate\Database\Eloquent\Collection;

interface IModeloRepository{
    public function getModeloById(int $id): Modelo;
    public function getAllModelos(): Collection;
    public function getAllModelosGroupByMarcaForInputs(): Collection;
    public function create(array $data): Modelo;
    public function update(int $id, array $data): Modelo;
    public function delete(int $id): Bool;
}