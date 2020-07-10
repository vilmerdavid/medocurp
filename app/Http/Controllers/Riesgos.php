<?php

namespace App\Http\Controllers;

use App\Models\Factores;
use App\Models\Factoritems;
use App\Models\FichaPI;
use App\Models\Riesgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Riesgos extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $riesgos=Riesgo::all();
        $data = array(
            'ficha' => $ficha,
            'riesgos'=>$riesgos,
            'factores'=>$ficha->factores_m
        );
        return view('riesgos.index',$data);
        
    }

    public function guardar(Request $request)
    {
        $atributos = Riesgo::all();

        try {
            DB::beginTransaction();
            $factor=new Factores();
            $factor->ficha_p_i_id=$request->ficha;
            $factor->save();

            foreach ($atributos as $atri) {
                $r=Riesgo::where('nombre',$atri->nombre)->first();
                $fi=new Factoritems();
                $fi->factores_id=$factor->id;
                $fi->riesgos_id=$r->id;
                if($request->input($atri->nombre)){
                    $fi->valor=$request->input($atri->nombre);
                }
                $fi->save();
            }
            DB::commit();
            $request->session()->flash('success','Nuevo riesgo ingresado');
        } catch (\Throwable $th) {
            DB::rollback();
            $request->session()->flash('info','Nuevo riesgo no ingresado, vuelva intentar');
        }

        return redirect()->route('factoresRiesgos',$request->ficha);
    }

    public function actualizar(Request $request)
    {
        foreach ($request->factoritems as $fi_id) {
            $fi=Factoritems::find($fi_id);
            $fi->valor=$request->valor[$fi_id];
            $fi->save();
        }
        return redirect()->route('factoresRiesgos',$request->ficha);
    }

    public function eliminar($idFac)
    {
        $factor=Factores::findOrFail($idFac);
        try {
            $factor->riesgos_m()->detach();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('factoresRiesgos',$factor->fichaPI_m->id);
    }
}
