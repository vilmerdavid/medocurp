<?php

namespace App\Http\Controllers;

use App\Models\FichaPI;
use App\Models\Patologico;
use Illuminate\Http\Request;

class Patologicos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array('ficha' => $ficha,'patologico'=>$ficha->patologico_m );
        return view('patologicos.index',$data);
    }

    public function guardar(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);

        $pa=$ficha->patologico_m;
        if(!$pa){
            $pa=new Patologico();  
            $pa->ficha_p_i_id=$ficha->id;
        }

        $pa->enf_cardio_vascular=$request->enf_cardio_vascular;
        $pa->enf_metabolica=$request->enf_metabolica;
        $pa->enf_neurologica=$request->enf_neurologica;
        $pa->enf_oncologica=$request->enf_oncologica;
        $pa->enf_infecciosa=$request->enf_infecciosa;
        $pa->enf_herd_cong=$request->enf_herd_cong;
        $pa->discapacidades=$request->discapacidades;
        $pa->otras=$request->otras;
        $pa->save();

        $request->session()->flash('success','Antecedentes patológicos familiares actuaizado');
        return redirect()->route('antecedentesPatologicos',$ficha->id);

    }
}
