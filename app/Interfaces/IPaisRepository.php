<?php

namespace App\Interfaces;

use App\Models\Pais;
use Illuminate\Database\Eloquent\Collection;

interface IPaisRepository{
    public function getPaisById(int $id): Pais;
    public function getAllPaises(): Collection;
    public function create(array $data): Pais;
    public function update(int $id, array $data): Pais;
    public function delete(int $id): Bool;
}