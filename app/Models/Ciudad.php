<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = "ciudades";

    protected $fillable = [
        'nombre',
        'abreviatura',
        'pais_id'
    ];

    public function pais(){
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }
}
