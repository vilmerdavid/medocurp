<?php

namespace App\Http\Controllers;

use App\Models\FichaPI;
use App\Models\Resultadogeneral;
use Illuminate\Http\Request;

class ResultadosGenerales extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array('ficha' => $ficha ,'rg'=>$ficha->resultadoGeneral_m);
        return view('resultados_generales.index',$data);
    }

    public function actualizar(Request $request)
    {

        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        
        $request->validate([
            'hematocrito_valor'=>'numeric|regex:'.$rg_decimal,
            'hemoglobina_valor'=>'numeric|regex:'.$rg_decimal,
            'urea_valor'=>'numeric|regex:'.$rg_decimal,
            'glucosa_valor'=>'numeric|regex:'.$rg_decimal,
            'creatinina_valor'=>'numeric|regex:'.$rg_decimal,
            'colesterol_valor'=>'numeric|regex:'.$rg_decimal,
            'trigliceridos_m_valor'=>'numeric|regex:'.$rg_decimal,
            'trigliceridos_f_valor'=>'numeric|regex:'.$rg_decimal,
            'acido_urico_m_valor'=>'numeric|regex:'.$rg_decimal,
            'acido_urico_f_valor'=>'numeric|regex:'.$rg_decimal,
            'tgo_valor'=>'numeric|regex:'.$rg_decimal,
            'tgp_valor'=>'numeric|regex:'.$rg_decimal,
            'psa_valor'=>'numeric|regex:'.$rg_decimal,
            'agregar_a_valor'=>'numeric|regex:'.$rg_decimal,
            'agregar_b_valor'=>'numeric|regex:'.$rg_decimal,
            'agregar_c_valor'=>'numeric|regex:'.$rg_decimal,
        ]);
        
        $ficha=FichaPI::findOrFail($request->ficha);
        $rg=$ficha->resultadoGeneral_m;
        if(!$rg){
            $rg=new Resultadogeneral();
            $rg->ficha_p_i_id=$ficha->id;
        }

        $rg->hematocrito_fecha=$request->hematocrito_fecha;
        $rg->hemoglobina_fecha=$request->hemoglobina_fecha;
        $rg->urea_fecha=$request->urea_fecha;
        $rg->glucosa_fecha=$request->glucosa_fecha;
        $rg->creatinina_fecha=$request->creatinina_fecha;
        $rg->colesterol_fecha=$request->colesterol_fecha;
        $rg->trigliceridos_m_fecha=$request->trigliceridos_m_fecha;
        $rg->trigliceridos_f_fecha=$request->trigliceridos_f_fecha;
        $rg->acido_urico_m_fecha=$request->acido_urico_m_fecha;
        $rg->acido_urico_f_fecha=$request->acido_urico_f_fecha;
        $rg->tgo_fecha=$request->tgo_fecha;
        $rg->tgp_fecha=$request->tgp_fecha;
        $rg->psa_fecha=$request->psa_fecha;
        $rg->emo_fecha=$request->emo_fecha;
        $rg->agregar_a_fecha=$request->agregar_a_fecha;
        $rg->agregar_b_fecha=$request->agregar_b_fecha;
        $rg->agregar_c_fecha=$request->agregar_c_fecha;
        $rg->hematocrito_valor=$request->hematocrito_valor;
        $rg->hemoglobina_valor=$request->hemoglobina_valor;
        $rg->urea_valor=$request->urea_valor;
        $rg->glucosa_valor=$request->glucosa_valor;
        $rg->creatinina_valor=$request->creatinina_valor;
        $rg->colesterol_valor=$request->colesterol_valor;
        $rg->trigliceridos_m_valor=$request->trigliceridos_m_valor;
        $rg->trigliceridos_f_valor=$request->trigliceridos_f_valor;
        $rg->acido_urico_m_valor=$request->acido_urico_m_valor;
        $rg->acido_urico_f_valor=$request->acido_urico_f_valor;
        $rg->tgo_valor=$request->tgo_valor;
        $rg->tgp_valor=$request->tgp_valor;
        $rg->psa_valor=$request->psa_valor;
        $rg->emo_valor=$request->emo_valor;
        $rg->agregar_a_valor=$request->agregar_a_valor;
        $rg->agregar_b_valor=$request->agregar_b_valor;
        $rg->agregar_c_valor=$request->agregar_c_valor;
        $rg->agregar_a_nombre=$request->agregar_a_nombre;
        $rg->agregar_b_nombre=$request->agregar_b_nombre;
        $rg->agregar_c_nombre=$request->agregar_c_nombre;
        $rg->observaciones_rg=$request->observaciones_rg;
        $rg->save();
        $request->session()->flash('success','Resultados de exámenes actualizado');
        return redirect()->route('resultadosGenerales',$ficha->id);
        
    }
}
