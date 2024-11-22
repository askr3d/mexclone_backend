<?php

namespace App\Interfaces;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Collection;

interface IMarcaRepository{
    public function getMarcaById(int $id): Marca;
    public function getAllMarcas(): Collection;
    public function create(array $data): Marca;
    public function update(int $id, array $data): Marca;
    public function delete(int $id): Bool;
}