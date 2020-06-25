<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_cages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');

            for ($i=1; $i <=4 ; $i++) { 
                $table->integer('p_'.$i)->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_cages');
    }
}
