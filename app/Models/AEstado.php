<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AEstado extends Model
{
    use HasFactory;
    protected $table = "autos_estados";
    protected $fillable = [
        'nombre'
    ];
}
