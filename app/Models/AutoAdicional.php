<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoAdicional extends Model
{
    use HasFactory;
    protected $table = "auto_adicionales";
    protected $fillable = [
        'auto_id',
        'adicional_id',
        'porcentaje_por_dia'
    ];

    public function adicional(){
        return $this->belongsTo(Adicional::class, 'adicional_id', 'id');
    }
}
