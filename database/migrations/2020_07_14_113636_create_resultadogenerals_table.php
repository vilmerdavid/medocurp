<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadogeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultadogenerals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $data = array(
                'hematocrito',
                'hemoglobina',
                'urea',
                'glucosa',
                'creatinina',
                'colesterol',
                'trigliceridos_m',
                'trigliceridos_f',
                'acido_urico_m',
                'acido_urico_f',
                'tgo',
                'tgp',
                'psa',
                'agregar_a',
                'agregar_b',
                'agregar_c'
            );

            
            foreach ($data as $d) {
                $table->date($d.'_fecha')->nullable();
                $table->decimal($d.'_valor')->nullable();
            }
            
            $table->string('agregar_a_nombre')->nullable();
            $table->string('agregar_b_nombre')->nullable();
            $table->string('agregar_c_nombre')->nullable();
            $table->string('emo_fecha')->nullable();
            $table->string('emo_valor')->nullable();
            $table->text('observaciones_rg')->nullable();
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
        Schema::dropIfExists('resultadogenerals');
    }
}
