<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor')->nullable();

            $table->string('accidente_trabajo')->nullable();
            $table->string('especificar_accidente')->nullable();
            $table->string('fecha_accidente')->nullable();
            $table->string('observaciones_accidente')->nullable();

            $table->string('enfermedad_profesional')->nullable();
            $table->string('especificar_enfermedad')->nullable();
            $table->string('fecha_enfermedad')->nullable();
            $table->string('observaciones_enfermedad')->nullable();
            

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neas');
    }
}
