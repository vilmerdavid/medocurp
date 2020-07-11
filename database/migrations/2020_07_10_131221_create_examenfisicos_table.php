<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenfisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenfisicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $atri = array(
                'cicatrices',
                'tatuajes',
                'piel_faneras',
                'parpados',
                'conjuntivas',
                'pupilas',
                'cornea',
                'motilidad',
                'c_auditivo_ext',
                'pabellon',
                'timpanos',
                'labios',
                'lengua',
                'faringe',
                'amigdalas',
                'dentadura',
                'tabique',
                'cornetes',
                'mucosas',
                'senos_paranasales',
                'tiroides_masas',
                'movilidad',
                'mamas',
                'corazon',
                'pulmones',
                'parrilla_costal',
                'visceras',
                'p_abdominal',
                'flexibilidad',
                'desviacin',
                'dolor',
                'pelvis',
                'genitales',
                'vascular',
                'm_superiores',
                'm_inferiores',
                'fuerza',
                'sensibilidad',
                'marcha',
                'reflejos'
            );

            $table->unsignedBigInteger('ficha_p_i_id');
            $table->foreign('ficha_p_i_id')->references('id')->on('ficha_p_i_s');

            foreach ($atri as $a) {
                $table->string($a)->nullable();
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
        Schema::dropIfExists('examenfisicos');
    }
}
