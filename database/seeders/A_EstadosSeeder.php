<?php

namespace Database\Seeders;

use App\Models\AEstado;
use Illuminate\Database\Seeder;

class A_EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $AE_Estados = [
        'Disponible',
        'Ocupado',
        'Mantenimiento',
        'Siniestro'
    ];

    public function run()
    {
        foreach($this->AE_Estados as $estado){
            AEstado::create([
                'nombre' => $estado
            ]);
        }
    }
}
