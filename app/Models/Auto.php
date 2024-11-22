<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $fillable = [
        'placas',
        'precio_por_dia',
        'precio_total',
        'modelo_id',
        'ciudad_id',
        'autos_estado_id',
    ];

    public function modelo(){
        return $this->belongsTo(Modelo::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'id');
    }

    public function estado(){
        return $this->belongsTo(AEstado::class,'autos_estado_id','id');
    }

    public function adicionales(){
        return $this->belongsToMany(Adicional::class,'auto_adicionales','auto_id','adicional_id');
    }

    public function auto_adicionales(){
        return $this->hasMany(AutoAdicional::class);
    }
}
