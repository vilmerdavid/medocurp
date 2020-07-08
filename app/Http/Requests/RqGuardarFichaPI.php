<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqGuardarFichaPI extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->input('usuario_id')){
            $historia_clinica_ci='required|string|max:255|unique:users,historia_clinica_ci,'.$this->input('usuario_id');
            $numero_archivo='required|string|max:255|unique:users,numero_archivo,'.$this->input('usuario_id');
        }else{
            $historia_clinica_ci='required|string|max:255|unique:users';
            $numero_archivo='required|string|max:255|unique:users';
        }



        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        return [
            'usuario_id'=>'nullable',
            'fichaPi_id'=>'nullable',
            // validacion paciente
            'historia_clinica_ci'=>$historia_clinica_ci,
            'numero_archivo'=>$numero_archivo,
            'apellido_uno'=>'required|string|max:255',
            'apellido_dos'=>'nullable|string|max:255',
            'nombre_uno'=>'required|string|max:255',
            'nombre_dos'=>'nullable|string|max:255',
            'sexo'=>'required|string|max:255',
            'edad'=>'required|string|max:255',
            'estado_civil'=>'required|string|max:255',
            'religion'=>'required|string|max:255',
            'grupo_sanguineo'=>'required|string|max:255',
            'lateralidad'=>'required|string|max:255',
            'orientacion_sexual'=>'required|string|max:255',
            'identidad_genero'=>'required|string|max:255',
            'discapacidad'=>'required|string|max:255',
            'porcentaje_discapacidad'=>'nullable|regex:'.$rg_decimal,
            'fecha_ingreso_trabajo'=>'required|date',
            'puesto_trabajo'=>'required|string|max:255',

            // validacion ficha
            'area_trabajo'=>'required|exists:area_trabajos,id',
            'actividades_relevantes'=>'nullable|string|max:255',
            'motivo_cosulta'=>'nullable|string|max:255',
            'antecedentes_clinicos'=>'nullable|string|max:255',
            'antecedentes_quirurgicos'=>'required|string|max:255',

            // antecedentes masculinos

            'ape_hombre'=>'nullable|string|max:255',
            'tiempo_ape_hombre'=>'nullable|string|max:255',
            'resultado_ape_hombre'=>'nullable|string|max:255',
            'eco_prostatico_hombre'=>'nullable|string|max:255',
            'tiempo_eco_prostatico_hombre'=>'nullable|string|max:255',
            'resultado_eco_prostatico_hombre'=>'nullable|string|max:255',
            'planificacion_familiar_hombre'=>'nullable|string|max:255',
            'hv_hombre'=>'nullable|string|max:255',
            'hm_hombre'=>'nullable|string|max:255',
            'observaciones_hombre'=>'nullable|string|max:255',

            // antecedentes femeninos

            'menarquia_mujer'=>'nullable|integer',
            'ciclos_mujer'=>'nullable|integer',
            'disminorrea_mujer'=>'nullable|string|max:255',
            'fum_mujer'=>'nullable|string|max:255',
            'g_mujer'=>'nullable|string|max:255',
            'p_mujer'=>'nullable|string|max:255',
            'c_mujer'=>'nullable|string|max:255',
            'a_mujer'=>'nullable|string|max:255',
            'hv_mujer'=>'nullable|string|max:255',
            'hm_mujer'=>'nullable|string|max:255',
            'vida_sexual_activa_mujer'=>'nullable|string|max:255',
            'planificacion_familiar_mujer'=>'nullable|string|max:255',
            'papanicolaou_mujer'=>'nullable|string|max:255',
            'tiempo_papanicolaou_mujer'=>'nullable|integer',
            'resultado_papanicolaou_mujer'=>'nullable|string|max:255',
            'eco_mamario_mujer'=>'nullable|string|max:255',
            'tiempo_eco_mamario_mujer'=>'nullable|integer',
            'resultado_eco_mamario_mujer'=>'nullable|string|max:255',
            'colposcopia_mujer'=>'nullable|string|max:255',
            'tiempo_colposcopia_mujer'=>'nullable|integer',
            'resultado_colposcopia_mujer'=>'nullable|string|max:255',
            'mamografia_mujer'=>'nullable|string|max:255',
            'tiempo_mamografia_mujer'=>'nullable|integer',
            'resultado_mamografia_mujer'=>'nullable|string|max:255',
            'observaciones_mujer'=>'nullable|string|max:255',

            // habitos toxicos

            
            'tabaco'=>'nullable|string|max:255',
            'tiempo_consumo_tabaco'=>'nullable|string|max:255',
            'cantidad_tabaco'=>'nullable|string|max:255',
            'exconsumidor_tabaco'=>'nullable|string|max:255',
            'tiempo_abastecimiento_tabaco'=>'nullable|string|max:255',
            'alcohol'=>'nullable|string|max:255',
            'tiempo_consumo_alcohol'=>'nullable|string|max:255',
            'cantidad_alcohol'=>'nullable|string|max:255',
            'exconsumidor_alcohol'=>'nullable|string|max:255',
            'tiempo_abastecimiento_alcohol'=>'nullable|string|max:255',
            'otras_drogas'=>'nullable|string|max:255',
            'cual_droga'=>'nullable|string|max:255',
            'tiempo_consumo_otras_drogas'=>'nullable|string|max:255',
            'cantidad_otras_drogas'=>'nullable|string|max:255',
            'exconsumidor_otras_drogas'=>'nullable|string|max:255',
            'tiempo_abastecimiento_otras_drogas'=>'nullable|string|max:255',


            // estilo de vida

            'actividad_fisica'=>'nullable|string|max:255',
            'cual_que_actividad_fisica_uno'=>'nullable|string|max:255',
            'cual_que_actividad_fisica_dos'=>'nullable|string|max:255',
            'tiempo_cantidad_actividad_fisica_uno'=>'nullable|string|max:255',
            'tiempo_cantidad_actividad_fisica_dos'=>'nullable|string|max:255',
            'mediacion_habitual'=>'nullable|string|max:255',
            'cual_que_actividad_mediacion_habitual_uno'=>'nullable|string|max:255',
            'cual_que_actividad_mediacion_habitual_dos'=>'nullable|string|max:255',
            'alergias'=>'nullable|string|max:255',
            'cual_que_alergias_uno'=>'nullable|string|max:255',
            'cual_que_alergias_dos'=>'nullable|string|max:255',
            'observacion_estilo_vida'=>'nullable|string|max:255',

        ];
    }
}
