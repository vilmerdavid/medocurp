<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('presuntivo')->nullable();
            $table->string('cie')->nullable();
            $table->string('pr')->nullable();
            $table->string('de')->nullable();

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
        Schema::dropIfExists('diagnosticos');
    }
}
