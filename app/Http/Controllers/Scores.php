<?php

namespace App\Http\Controllers;

use App\Models\FichaPI;
use Illuminate\Http\Request;

class Scores extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array(
            'ficha' => $ficha,
            'paciente'=>$ficha->user_m,
            'rg'=>$ficha->resultadoGeneral_m,
            'constante'=>$ficha->constante_m
        );
        return view('scores.index',$data);
    }

    public function actualizarScore(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $ficha->valor_score=$request->valor;
        $ficha->save();
        $request->session()->flash('success','Valor HDL actualizado');
        return redirect()->route('scores',$request->ficha);
    }
}
