<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\FichaPI;
use Illuminate\Http\Request;

class Actividades extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array('ficha' => $ficha,'actividades'=>$ficha->actividadExtralaboral_m);
        return view('actividades.index',$data);
    }
    public function guardar(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $ac=$ficha->actividadExtralaboral_m;
        
        $ac=new Actividad();
        $ac->ficha_p_i_id=$ficha->id;
        $ac->nombre=$request->nombre;
        $ac->tiempo=$request->tiempo;
        $ac->save();
        
        $request->session()->flash('success','Actividad extralaboral ingresado');
        return redirect()->route('actividadesExtralaborales',$ficha->id);
    }

    public function actualizar(Request $request)
    {
        $ac=Actividad::findOrFail($request->actividad);
        $ac->nombre=$request->nombre;
        $ac->tiempo=$request->tiempo;
        $ac->save();
        
        $request->session()->flash('success','Actividad extralaboral actualizado');
        return redirect()->route('actividadesExtralaborales',$ac->fichaPI_m->id);
    }

    public function eliminar(Request $request,$idAc)
    {
        $acex=Actividad::findOrFail($idAc);
        try {
            $acex->delete();
            $request->session()->flash('success','Actividad extralaboral eliminado');
        } catch (\Throwable $th) {
            $request->session()->flash('info','Actividad extralaboral no eliminado, vuelva intentar');
        }
        return redirect()->route('actividadesExtralaborales',$acex->fichaPI_m->id);
    }

    public function ActualizarEnfermedadActual(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $ficha->enfermedad_actual=$request->enfermedad_actual;
        $ficha->save();
        $request->session()->flash('success','Enfermedad actual guardado');
        return redirect()->route('actividadesExtralaborales',$ficha->id);
    }
}
