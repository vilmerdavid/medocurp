<?php

namespace App\Http\Controllers;

use App\Models\Constante;
use App\Models\Examenfisico;
use App\Models\FichaPI;
use Illuminate\Http\Request;

class Constantes extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $ex=$ficha->examenFisico_m;
        if(!$ex){
            $ex=new Examenfisico();
            $ex->ficha_p_i_id=$ficha->id;
            $ex->save();
        }
        $data = array('ficha' => $ficha,'constante'=>$ficha->constante_m,'ex'=>$ex );
        return view('constantes.index',$data);
    }

    public function actualizar(Request $request)
    {
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        $request->validate([
            'talla'=>'required|regex:'.$rg_decimal.'|numeric|min:1',
            'presion_arterial_uno'=>'required|regex:'.$rg_decimal,
            'presion_arterial_dos'=>'required|regex:'.$rg_decimal,
            'temp'=>'required|regex:'.$rg_decimal,
            'f_c'=>'required|regex:'.$rg_decimal,
            'so'=>'required|regex:'.$rg_decimal,
            'f_r'=>'required|regex:'.$rg_decimal,
            'peso'=>'required|regex:'.$rg_decimal,
            'talla'=>'required|regex:'.$rg_decimal,
            
            'p_abdom'=>'required|regex:'.$rg_decimal,
        ]);
        $fi=FichaPI::findOrFail($request->ficha);
        $con=$fi->constante_m;
        if(!$con){
            $con=new Constante();
            $con->ficha_p_i_id=$fi->id;
        }
        $con->presion_arterial_uno=$request->presion_arterial_uno;
        $con->presion_arterial_dos=$request->presion_arterial_dos;
        $con->temp=$request->temp;
        $con->f_c=$request->f_c;
        $con->so=$request->so;
        $con->f_r=$request->f_r;
        $con->peso=$request->peso;
        $con->talla=$request->talla;
        $con->indice_de_masa_corp=$request->indice_de_masa_corp;
        $con->p_abdom=$request->p_abdom;
        $con->save();
        $request->session()->flash('success','Constantes vitales y antropometría actualizados');
        return redirect()->route('constantes',$fi->id);
    }

    public function actualizarExamenFisico(Request $request)
    {
        
        $ficha=FichaPI::findOrFail($request->ficha);
        $ex=$ficha->examenFisico_m;
        if(!$ex){
            $ex=new Examenfisico();
            $ex->ficha_p_i_id=$ficha->id;
        }

        
        $ex->cicatrices=$request->cicatrices;
        $ex->tatuajes=$request->tatuajes;
        $ex->piel_faneras=$request->piel_faneras;
        $ex->parpados=$request->parpados;
        $ex->conjuntivas=$request->conjuntivas;
        $ex->pupilas=$request->pupilas;
        $ex->cornea=$request->cornea;
        $ex->motilidad=$request->motilidad;
        $ex->c_auditivo_ext=$request->c_auditivo_ext;
        $ex->pabellon=$request->pabellon;
        $ex->timpanos=$request->timpanos;
        $ex->labios=$request->labios;
        $ex->lengua=$request->lengua;
        $ex->faringe=$request->faringe;
        $ex->amigdalas=$request->amigdalas;
        $ex->dentadura=$request->dentadura;
        $ex->tabique=$request->tabique;
        $ex->cornetes=$request->cornetes;
        $ex->mucosas=$request->mucosas;
        $ex->senos_paranasales=$request->senos_paranasales;
        $ex->tiroides_masas=$request->tiroides_masas;
        $ex->movilidad=$request->movilidad;
        $ex->mamas=$request->mamas;
        $ex->corazon=$request->corazon;
        $ex->pulmones=$request->pulmones;
        $ex->parrilla_costal=$request->parrilla_costal;
        $ex->visceras=$request->visceras;
        $ex->p_abdominal=$request->p_abdominal;
        $ex->flexibilidad=$request->flexibilidad;
        $ex->desviacin=$request->desviacin;
        $ex->dolor=$request->dolor;
        $ex->pelvis=$request->pelvis;
        $ex->genitales=$request->genitales;
        $ex->vascular=$request->vascular;
        $ex->m_superiores=$request->m_superiores;
        $ex->m_inferiores=$request->m_inferiores;
        $ex->fuerza=$request->fuerza;
        $ex->sensibilidad=$request->sensibilidad;
        $ex->marcha=$request->marcha;
        $ex->reflejos=$request->reflejos;
        $ex->save();

        $request->session()->flash('success','Examen físico regional actualizados');
        return redirect()->route('constantes',$ficha->id);
    }
}
