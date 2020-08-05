<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            
            $table->unsignedBigInteger('area_trabajo_id');
            $table->foreign('area_trabajo_id')->references('id')->on('area_trabajos');
            
            $table->string('tipoFicha')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->time('tiempo')->nullable();
            $table->string('actividad_uno')->nullable();
            $table->string('riesgo_uno')->nullable();
            $table->string('actividad_dos')->nullable();
            $table->string('riesgo_dos')->nullable();
            $table->string('actividad_tres')->nullable();
            $table->string('riesgo_tres')->nullable();

            $table->string('actividades_relevantes')->nullable();
            $table->string('motivo_cosulta')->nullable();
            $table->string('antecedentes_clinicos')->nullable();
            $table->string('antecedentes_quirurgicos')->nullable();

            $table->string('ape_hombre')->nullable();
            $table->string('tiempo_ape_hombre')->nullable();
            $table->string('resultado_ape_hombre')->nullable();
            $table->string('eco_prostatico_hombre')->nullable();
            $table->string('tiempo_eco_prostatico_hombre')->nullable();
            $table->string('resultado_eco_prostatico_hombre')->nullable();
            $table->string('planificacion_familiar_hombre')->nullable();
            $table->string('hv_hombre')->nullable();
            $table->string('hm_hombre')->nullable();
            $table->string('observaciones_hombre')->nullable();
            $table->string('menarquia_mujer')->nullable();
            $table->string('ciclos_mujer')->nullable();
            $table->string('disminorrea_mujer')->nullable();
            $table->string('fum_mujer')->nullable();
            $table->string('g_mujer')->nullable();
            $table->string('p_mujer')->nullable();
            $table->string('c_mujer')->nullable();
            $table->string('a_mujer')->nullable();
            $table->string('hv_mujer')->nullable();
            $table->string('hm_mujer')->nullable();
            
            $table->string('vida_sexual_activa_mujer')->nullable();
            $table->string('planificacion_familiar_mujer')->nullable();
            $table->string('papanicolaou_mujer')->nullable();
            $table->string('tiempo_papanicolaou_mujer')->nullable();
            $table->string('resultado_papanicolaou_mujer')->nullable();
            $table->string('eco_mamario_mujer')->nullable();
            $table->string('tiempo_eco_mamario_mujer')->nullable();
            $table->string('resultado_eco_mamario_mujer')->nullable();
            $table->string('colposcopia_mujer')->nullable();
            $table->string('tiempo_colposcopia_mujer')->nullable();
            $table->string('resultado_colposcopia_mujer')->nullable();
            $table->string('mamografia_mujer')->nullable();
            $table->string('tiempo_mamografia_mujer')->nullable();
            $table->string('resultado_mamografia_mujer')->nullable();
            $table->string('observaciones_mujer')->nullable();

            // $table->string('tabaco')->nullable();
            // $table->string('tiempo_consumo_tabaco')->nullable();
            // $table->string('cantidad_tabaco')->nullable();
            // $table->string('exconsumidor_tabaco')->nullable();
            // $table->string('tiempo_abastecimiento_tabaco')->nullable();
            // $table->string('alcohol')->nullable();
            
            // $table->string('tiempo_consumo_alcohol')->nullable();
            // $table->string('cantidad_alcohol')->nullable();
            // $table->string('exconsumidor_alcohol')->nullable();
            // $table->string('tiempo_abastecimiento_alcohol')->nullable();
            // $table->string('otras_drogas')->nullable();
            // $table->string('cual_droga')->nullable();
            // $table->string('tiempo_consumo_otras_drogas')->nullable();
            // $table->string('cantidad_otras_drogas')->nullable();
            // $table->string('exconsumidor_otras_drogas')->nullable();
            
            // $table->string('tiempo_abastecimiento_otras_drogas')->nullable();
            // $table->string('actividad_fisica')->nullable();
            // $table->string('cual_que_actividad_fisica_uno')->nullable();
            // $table->string('cual_que_actividad_fisica_dos')->nullable();
            // $table->string('tiempo_cantidad_actividad_fisica_uno')->nullable();
            // $table->string('tiempo_cantidad_actividad_fisica_dos')->nullable();
            
            // $table->string('mediacion_habitual')->nullable();
            // $table->string('cual_que_actividad_mediacion_habitual_uno')->nullable();
            // $table->string('cual_que_actividad_mediacion_habitual_dos')->nullable();
            // $table->string('tiempo_mediacion_habitual_uno')->nullable();
            // $table->string('tiempo_mediacion_habitual_dos')->nullable();

            // $table->string('alergias')->nullable();
            // $table->string('cual_que_alergias_uno')->nullable();
            // $table->string('cual_que_alergias_dos')->nullable();
            // $table->string('observacion_estilo_vida')->nullable();

            $table->string('enfermedad_actual')->nullable();
            $table->decimal('valor_score')->nullable();


            $table->string('evaluacion')->nullable();
            $table->decimal('evaluacion_a')->nullable();
            $table->string('evaluacion_b')->nullable();
            $table->decimal('evaluacion_c')->nullable();


            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_p_i_s');
    }
}
