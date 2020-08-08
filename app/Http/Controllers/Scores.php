<?php

namespace App\Http\Controllers;

use App\Models\FichaPI;
use Illuminate\Http\Request;
use PDF;
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
       // $ficha->valor_final_hombre=$request->valor_final_hombre;
     //   $ficha->valor_final_final=$request->valor_final_final;
        $ficha->save();
        $request->session()->flash('success','Valor HDL actualizado');
        return redirect()->route('scores',$request->ficha);
    }

    public function certificadoMedico($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array(
            'ficha' => $ficha,
            'paciente'=>$ficha->user_m,
            'rg'=>$ficha->resultadoGeneral_m,
            'constante'=>$ficha->constante_m,
            'empresa'=>$ficha->areaTrabajo_m->empresa_m,
            'am'=>$ficha->aptitud_m,
            'recomendaciones'=>$ficha->recomendacion_m
        );
        return view('scores.certificado',$data);
    }

    public function descargarCertificado($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array(
            'ficha' => $ficha,
            'paciente'=>$ficha->user_m,
            'rg'=>$ficha->resultadoGeneral_m,
            'constante'=>$ficha->constante_m,
            'empresa'=>$ficha->areaTrabajo_m->empresa_m,
            'am'=>$ficha->aptitud_m,
            'recomendaciones'=>$ficha->recomendacion_m
        );
        $pdf = PDF::loadView('scores.certificadoPdf', $data);
        return $pdf->inline('Certificado médico.pdf');
    }

    public function actualizarCertificadoMedico(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $ficha->tipoFicha=$request->evaluacion;
        $ficha->evaluacion_a=$request->evaluacion_a;
        $ficha->evaluacion_b=$request->evaluacion_b;
        $ficha->evaluacion_c=$request->evaluacion_c;
        $ficha->save();
        $request->session()->flash('success','Cerficado médico actualizado');
        return redirect()->route('certificadoMedico',$request->ficha);
    }
}
