<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedendentetrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedendentetrabajos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');

            $table->string('empresa')->nullable();
            $table->string('puesto')->nullable();
            $table->string('actividad')->nullable();
            $table->decimal('tdt')->nullable();
            $table->decimal('sso')->nullable();
            $table->decimal('f')->nullable();
            $table->decimal('m')->nullable();
            $table->decimal('q')->nullable();
            $table->decimal('b')->nullable();
            $table->decimal('e')->nullable();
            $table->decimal('p')->nullable();
            $table->string('observaciones')->nullable();
            $table->decimal('nea')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedendentetrabajos');
    }
}
