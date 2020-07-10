<?php

use App\Models\Riesgo;
use Illuminate\Database\Seeder;

class RiesgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atributos = array(
            'puesto_de_trabajo_area',
            'actividades',
            'temperaturas_altas',
            'temperaturas_bajas',
            'radiacion_ionizante',
            'radiacion_no_ionizante',
            'ruido',
            'vibracion',
            'iluminacion' ,
            'ventilacion',
            'fluido_electrico',
            'otros_fisico',
            'atrapamiento_entre_maquinas',
            'atrapamiento_entre_superficies',
            'atrapamiento_entre_objetos',
            'caida_de_objetos',
            'caidas_al_mismo_nivel',
            'caidas_a_diferente_nivel',
            'contacto_electrico',
            'contacto_con_superficies_de_trabajos',
            'proyeccion_de_partículas_fragmentos',
            'proyeccion_de_fluidos',
            'pinchazos',
            'cortes',
            'atropellamientos_por_vehiculos',
            'choques_colision_vehicular',
            'otros_mecanico',
            'solidos',
            'polvos',
            'humos',
            'liquidos',
            'vapores',
            'aerosoles',
            'neblinas',
            'gaseosos',
            'otros_quimico',
            'medidas_preventivas',
            'virus',
            'hongos',
            'bacterias',
            'parasitos',
            'exposicion_a_vectores',
            'exposicion_a_animales_selvaticos',
            'otros_biologico',
            'manejo_manual_de_cargas',
            'movimiento_repetitivos	',
            'posturas_forzadas	',
            'trabajos_con_pvd	',
            'otros_ergonomico',
            'monotonia_del_trabajo 	',
            'sobrecarga_laboral	',
            'minuciosidad_de_la_tarea',
            'alta_responsabilidad	',
            'autonomia_en_la_toma_de_decisiones',
            'supervision_y_estilos_de_direccion_deficiente	',
            'conflicto_de_rol',
            'falta_de_claridad_en_las_funciones',
            'incorrecta_distribucion_del_trabajo',
            'turnos_rotativos',
            'relaciones_interpersonales 	',
            'inestabilidad_laboral',
            'otros_psicosocial',
        );

        foreach ($atributos as $at) {
            $r=Riesgo::where('nombre',$at)->first();
            if(!$r){
                $r=new Riesgo();
                $r->nombre=$at;
                $r->save();
            }
        }
    }
}
