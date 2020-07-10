<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatologicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patologicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');

            $table->string('enf_cardio_vascular')->nullable();
            $table->string('enf_metabolica')->nullable();
            $table->string('enf_neurologica')->nullable();
            $table->string('enf_oncologica')->nullable();
            $table->string('enf_infecciosa')->nullable();
            $table->string('enf_herd_cong')->nullable();
            $table->string('discapacidades')->nullable();
            $table->string('otras')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patologicos');
    }
}
