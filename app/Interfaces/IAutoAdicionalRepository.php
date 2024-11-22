<?php

namespace App\Interfaces;

use App\Models\AutoAdicional;
use Illuminate\Database\Eloquent\Collection;

interface IAutoAdicionalRepository{
    public function getAutoAdicionalById(int $id): AutoAdicional;
    public function getAutoAdicionalWithAdicionales(int $id): AutoAdicional;
    public function getAllAutoAdicionales(): Collection;
    public function alreadyExists(int $auto_id, int $adicional_id): Bool;
    public function create(array $data): AutoAdicional;
    public function update(int $id, array $data): AutoAdicional;
    public function delete(int $id): Bool;
}