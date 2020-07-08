<?php

namespace App\Http\Controllers;

use App\Models\Antecedendentetrabajo;
use App\Models\FichaPI;
use App\Models\Nea;
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

    public function actualizarNea(Request $request)
    {
        $request->validate([
            'nea'=>'integer|min:1'
        ]);
        $ficha=FichaPI::findOrFail($request->ficha);
        $nea=$ficha->nea_m;
        if(!$nea){
            $nea=new Nea();
            $nea->ficha_p_i_id=$ficha->id;
        }
        $nea->valor=$request->nea;
        $nea->save();
        $request->session()->flash('success','Nea actualizado');
        return redirect()->route('antecedentesTrabajo',$ficha->id);

    }

    public function eliminar(Request $request,$idAnte)
    {
        $a=Antecedendentetrabajo::findOrFail($idAnte);
        try {
            $a->delete();
            $request->session()->flash('success','Antecedente de trabajo eliminado');
        } catch (\Throwable $th) {
            $request->session()->flash('info','Antecedente de trabajo no eliminado');
        }
        return redirect()->route('antecedentesTrabajo',$a->fichaPI_m->id);
    }

    public function actualizarAccidenteEnfermedad(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $nea=$ficha->nea_m;
        if(!$nea){
            $nea=new Nea();
            $nea->ficha_p_i_id=$ficha->id;
        }
        
        $nea->accidente_trabajo=$request->accidente_trabajo;
        $nea->especificar_accidente=$request->especificar_accidente;
        $nea->fecha_accidente=$request->fecha_accidente;
        $nea->observaciones_accidente=$request->observaciones_accidente;
        $nea->enfermedad_profesional=$request->enfermedad_profesional;
        $nea->especificar_enfermedad=$request->especificar_enfermedad;
        $nea->fecha_enfermedad=$request->fecha_enfermedad;
        $nea->observaciones_enfermedad=$request->observaciones_enfermedad;

        $nea->save();
        $request->session()->flash('success','ACCIDENTES DE TRABAJO, ENFERMEDADES PROFESIONALES ACTUALIZADOS');
        return redirect()->route('antecedentesTrabajo',$ficha->id);

    }
}
