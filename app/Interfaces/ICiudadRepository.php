<?php

namespace App\Interfaces;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Collection;

interface ICiudadRepository{
    public function getCiudadById(int $id): Ciudad;
    public function getAllCiudades(): Collection;
    public function getAllModelosGroupByMarcaForInputs(): Collection;
    public function create(array $data): Ciudad;
    public function update(int $id, array $data): Ciudad;
    public function delete(int $id): Bool;
}