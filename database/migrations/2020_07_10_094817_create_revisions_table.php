<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');
            
            $table->string('piel_y_anexos')->nullable();
            $table->string('organos_de_los_sentidos')->nullable();
            $table->string('respiratorio')->nullable();
            $table->string('cardio_vascular')->nullable();
            $table->string('digestivo')->nullable();
            $table->string('genito_urinario')->nullable();
            $table->string('musculo_esqueletico')->nullable();
            $table->string('endocrino')->nullable();
            $table->string('hemo_linfatico')->nullable();
            $table->string('nervioso')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisions');
    }
}
