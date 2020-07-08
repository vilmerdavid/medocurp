<?php

namespace App\Http\Controllers;

use App\Models\Antecedendentetrabajo;
use App\Models\FichaPI;
use Illuminate\Http\Request;

class AntecedentesTrabajo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array('ficha' => $ficha,'antecedentes'=>$ficha->antecedentesTrabajo_m );
        return view('antecedentesTrabajo.index',$data);
    }

    public function guardar(Request $request)
    {
        $a=new Antecedendentetrabajo();
        $a->ficha_p_i_id=$request->ficha;
        $a->empresa=$request->empresa;
        $a->puesto=$request->puesto;
        $a->actividad=$request->actividad;
        $a->tdt=$request->tdt;
        $a->sso=$request->sso;
        $a->f=$request->f;
        $a->m=$request->m;
        $a->q=$request->q;
        $a->b=$request->b;
        $a->e=$request->e;
        $a->p=$request->p;
        $a->observaciones=$request->observaciones;
        $a->save();
        $request->session()->flash('success','Antecedente de trabajo ingresado');
        return redirect()->route('antecedentesTrabajo',$request->ficha);
    }

    public function actualizar(Request $request)
    {
        $a=Antecedendentetrabajo::findOrFail($request->antecedente);
        $a->empresa=$request->empresa;
        $a->puesto=$request->puesto;
        $a->actividad=$request->actividad;
        $a->tdt=$request->tdt;
        $a->sso=$request->sso;
        $a->f=$request->f;
        $a->m=$request->m;
        $a->q=$request->q;
        $a->b=$request->b;
        $a->e=$request->e;
        $a->p=$request->p;
        $a->observaciones=$request->observaciones;
        $a->save();
        $request->session()->flash('success','Antecedente de trabajo actualizado');
        return redirect()->route('antecedentesTrabajo',$a->fichaPI_m->id);
    }
}
