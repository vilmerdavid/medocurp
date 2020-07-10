<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factoritems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('factores_id');
            $table->foreign('factores_id')->references('id')->on('factores');

            $table->unsignedBigInteger('riesgos_id');
            $table->foreign('riesgos_id')->references('id')->on('riesgos');

            $table->string('valor')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factoritems');
    }
}
