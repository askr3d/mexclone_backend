<?php

namespace App\Interfaces;

use App\Models\Auto;
use Illuminate\Database\Eloquent\Collection;

interface IAutoRepository{
    public function getAutoById(int $id): Auto;
    public function getAllAutos(): Collection;
    public function getAllAutoAdicionalesWithConcepto(int $id): Auto;
    public function getAllEstados(): Collection;
    public function create(array $data): Auto;
    public function update(int $id, array $data): Auto;
    public function delete(int $id): Bool;
}