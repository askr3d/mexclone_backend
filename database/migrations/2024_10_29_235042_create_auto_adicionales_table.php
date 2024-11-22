<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoAdicionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_adicionales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auto_id')->constrained()->cascadeOnDelete();
            $table->foreignId('adicional_id')->constrained('adicionales')->cascadeOnDelete();
            $table->double('porcentaje_por_dia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_adicionales');
    }
}
