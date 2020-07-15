<?php

namespace App\Http\Controllers;

use App\Aptitudmedica;
use App\Models\FichaPI;
use App\Models\Recomendacion;
use Illuminate\Http\Request;

class AptitudesMedicas extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array(
            'ficha' => $ficha,
            'am'=>$ficha->aptitud_m,
            'recomendaciones'=>$ficha->recomendacion_m
        );
        return view('aptitudes.index',$data);
    }

    public function actualizar(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $am=$ficha->aptitud_m;
        if(!$am){
            $am=new Aptitudmedica();
            $am->ficha_p_i_id=$request->ficha;
        }
        $am->opcion=$request->opcion;
        $am->observacion=$request->observacion;
        $am->limitacion=$request->limitacion;
        $am->save();
        $request->session()->flash('success','Aptitud médica guardado');
        return redirect()->route('aptitudesMedicas',$request->ficha);
    }

    public function guardarRecomendacion(Request $request)
    {
        $re=new Recomendacion();
        $re->recomendacion=$request->recomendacion;
        $re->ficha_p_i_id=$request->ficha;
        $re->save();
        $request->session()->flash('success','Recomendación guardado');
        return redirect()->route('aptitudesMedicas',$request->ficha);
    }

    public function actualizarRecomendacion(Request $request)
    {
        $re=Recomendacion::findOrFail($request->id);
        $re->recomendacion=$request->recomendacion;
        $re->save();
        $request->session()->flash('success','Recomendación actualizado');
        return redirect()->route('aptitudesMedicas',$re->ficha_p_i_id);
    }

    public function eliminarRecomendacion(Request $request,$idRe)
    {
        $re=Recomendacion::findOrFail($idRe);
        try {
            $re->delete();
            $request->session()->flash('success','Recomendación eliminado');
        } catch (\Throwable $th) {
            $request->session()->flash('info','Recomendación no eliminado');
        }
        return redirect()->route('aptitudesMedicas',$re->ficha_p_i_id);
    }
}
