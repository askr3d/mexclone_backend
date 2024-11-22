<?php

namespace App\Interfaces;

use App\Models\Adicional;
use Illuminate\Database\Eloquent\Collection;

interface IAdicionalRepository{
    public function getAdicionalById(int $id): Adicional;
    public function getAllAdicionales(): Collection;
    public function create(array $data): Adicional;
    public function update(int $id, array $data): Adicional;
    public function delete(int $id): Bool;
}