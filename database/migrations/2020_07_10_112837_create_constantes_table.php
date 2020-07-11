<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');
            
            $table->decimal('presion_arterial_uno')->nullable();
            $table->decimal('presion_arterial_dos')->nullable();
            $table->decimal('temp')->nullable();
            $table->decimal('f_c')->nullable();
            $table->decimal('so')->nullable();
            $table->decimal('f_r')->nullable();
            $table->decimal('peso')->nullable();
            $table->decimal('talla')->nullable();
            $table->decimal('indice_de_masa_corp')->nullable();
            $table->decimal('p_abdom')->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constantes');
    }
}
