<?php

namespace App\Http\Controllers;

use App\Models\FichaPI;
use App\Models\Revision;
use Illuminate\Http\Request;

class Revisiones extends Controller
{
    public function index($idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array('ficha' => $ficha,'revision'=>$ficha->revisiones_m);
        return view('revisiones.index',$data);
    }

    public function actualizar(Request $request)
    {
        $fi=FichaPI::findOrFail($request->ficha);
        $re=$fi->revisiones_m;
        if(!$re){
            $re=new Revision();
            $re->ficha_p_i_id=$fi->id;
        }
        $re->piel_y_anexos=$request->piel_y_anexos;
        $re->organos_de_los_sentidos=$request->organos_de_los_sentidos;
        $re->respiratorio=$request->respiratorio;
        $re->cardio_vascular=$request->cardio_vascular;
        $re->digestivo=$request->digestivo;
        $re->genito_urinario=$request->genito_urinario;
        $re->musculo_esqueletico=$request->musculo_esqueletico;
        $re->endocrino=$request->endocrino;
        $re->hemo_linfatico=$request->hemo_linfatico;
        $re->nervioso=$request->nervioso;
        $re->save();
        $request->session()->flash('success','Revisión actual de órganos y sistemas actualizados');
        return redirect()->route('revisionOrganosSistemas',$request->ficha);
    }
}
