<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\FichaPI;
use Illuminate\Http\Request;

class Diagnosticos extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array(
            'ficha' => $ficha,
            'diagnosticos'=>$ficha->diagnostico_m,
            'constante'=>$ficha->constante_m,
            'paciente'=>$ficha->user_m,
            'rg'=>$ficha->resultadoGeneral_m,
         );
        return view('diagnosticos.index',$data);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'presuntivo'=>'required|string|max:255',
            'cie'=>'required|string|max:255',
            'pr'=>'required|string|max:255',
            'de'=>'required|string|max:255',
        ]);

        $ficha=FichaPI::findOrFail($request->ficha);
        $dg=new Diagnostico();
        $dg->presuntivo=$request->presuntivo;
        $dg->cie=$request->cie;
        $dg->pr=$request->pr;
        $dg->de=$request->de;
        $dg->ficha_p_i_id=$ficha->id;
        $dg->save();
        $request->session()->flash('success','Diagnóstico guardado');
        return redirect()->route('diagnosticos',$ficha->id);
        
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'presuntivo'=>'required|string|max:255',
            'cie'=>'required|string|max:255',
            'pr'=>'required|string|max:255',
            'de'=>'required|string|max:255',
        ]);

        $dg=Diagnostico::findOrFail($request->diagnostico);
        $dg->presuntivo=$request->presuntivo;
        $dg->cie=$request->cie;
        $dg->pr=$request->pr;
        $dg->de=$request->de;
        $dg->save();
        $request->session()->flash('success','Diagnóstico actualizado');
        return redirect()->route('diagnosticos',$dg->ficha_p_i_id);
    }

    public function eliminar(Request $request,$idDg)
    {
        $dg=Diagnostico::findOrFail($idDg);
        try {
            $dg->delete();
            $request->session()->flash('success','Diagnóstico eliminado');
        } catch (\Throwable $th) {
            $request->session()->flash('info','Diagnóstico no eliminado');
        }
        return redirect()->route('diagnosticos',$dg->ficha_p_i_id);
    }
}
