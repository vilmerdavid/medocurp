<?php

namespace App\Http\Controllers;

use App\DataTables\FichasPI\EmpresasDataTable;
use App\DataTables\FichasPIDataTable;
use App\Http\Requests\RqGuardarFichaPI;
use App\Models\AreaTrabajo;
use App\Models\Puestotrabajo;
use App\Models\Empresa;
use App\Models\FichaPI;
use App\Models\Pregunta;
use App\Models\TestAsist;
use App\Models\TestCage;
use App\Models\TestFagerstorm;
use App\Models\TestFagertom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Test;
Use PDF;
class FichasPI extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(FichasPIDataTable $dataTable)
    {
        return $dataTable->render('fichas_pi.index');
    }

    public function crear(EmpresasDataTable $dataTable,$idEmp)
    {
        $empresa=Empresa::findOrFail($idEmp);
        $data = array('empresa' => $empresa,'ficha' =>FichaPI::find(0));
        return $dataTable->render('fichas_pi.crear',$data);
    }


    public function guardar(RqGuardarFichaPI $request)
    {
        $areaTrabajo=AreaTrabajo::findOrFail($request->area_trabajo);
        $puestoTrabajo2=PuestoTrabajo::findOrFail($request->puesto_trabajo);
        try {
            DB::beginTransaction();
            $u=User::where('historia_clinica_ci',$request->historia_clinica_ci)->first();
            if(!$u){
                $u=new User();
            }
            
            $u->historia_clinica_ci=$request->historia_clinica_ci;
            $u->numero_archivo=$request->numero_archivo;
            $u->apellido_uno=$request->apellido_uno;
            $u->apellido_dos=$request->apellido_dos;
            $u->nombre_uno=$request->nombre_uno;
            $u->nombre_dos=$request->nombre_dos;
            $u->sexo=$request->sexo;
            $u->edad=$request->edad;
            $u->estado_civil=$request->estado_civil;
            $u->religion=$request->religion;
            $u->grupo_sanguineo=$request->grupo_sanguineo;
            $u->lateralidad=$request->lateralidad;
            $u->orientacion_sexual=$request->orientacion_sexual;
            $u->identidad_genero=$request->identidad_genero;
            $u->discapacidad=$request->discapacidad;
            $u->porcentaje_discapacidad=$request->porcentaje_discapacidad;
            $u->fecha_ingreso_trabajo=$request->fecha_ingreso_trabajo;
            $u->puesto_trabajo=$request->puesto_trabajo;
            $u->puesto_trabajo2=$request->puesto_trabajo;
            $u->save();

            $f=FichaPI::find($request->fichaPi_id);
            if(!$f){
                $f=new FichaPI();
            }
            
            $f->user_id=$u->id;
            $f->area_trabajo_id=$request->area_trabajo;
            //solo configuradios
            $f->puesto_trabajo_id=$request->puesto_trabajo;
            ////////
            $f->actividades_relevantes=$request->actividades_relevantes;
            $f->motivo_cosulta=$request->motivo_cosulta;
            $f->antecedentes_clinicos=$request->antecedentes_clinicos;
            $f->antecedentes_quirurgicos=$request->antecedentes_quirurgicos;

            $f->tipoFicha=$request->tipoFicha;
            $f->fecha_salida=$request->fecha_salida;
            $f->tiempo=$request->tiempo;
            $f->actividad_uno=$request->actividad_uno;
            $f->riesgo_uno=$request->riesgo_uno;
            $f->actividad_dos=$request->actividad_dos;
            $f->riesgo_dos=$request->riesgo_dos;
            $f->actividad_tres=$request->actividad_tres;
            $f->riesgo_tres=$request->riesgo_tres;

            $f->ape_hombre=$request->ape_hombre;
            $f->tiempo_ape_hombre=$request->tiempo_ape_hombre;
            $f->resultado_ape_hombre=$request->resultado_ape_hombre;
            $f->eco_prostatico_hombre=$request->eco_prostatico_hombre;
            $f->tiempo_eco_prostatico_hombre=$request->tiempo_eco_prostatico_hombre;
            $f->resultado_eco_prostatico_hombre=$request->resultado_eco_prostatico_hombre;
            $f->planificacion_familiar_hombre=$request->planificacion_familiar_hombre;
            $f->hv_hombre=$request->hv_hombre;
            $f->hm_hombre=$request->hm_hombre;
            $f->observaciones_hombre=$request->observaciones_hombre;
            $f->menarquia_mujer=$request->menarquia_mujer;
            
            $f->ciclos_mujer=$request->ciclos_mujer;
            $f->disminorrea_mujer=$request->disminorrea_mujer;
            $f->fum_mujer=$request->fum_mujer;
            $f->g_mujer=$request->g_mujer;
            $f->p_mujer=$request->p_mujer;
            $f->c_mujer=$request->c_mujer;
            $f->a_mujer=$request->a_mujer;
            $f->hv_mujer=$request->hv_mujer;
            $f->hm_mujer=$request->hm_mujer;
            $f->vida_sexual_activa_mujer=$request->vida_sexual_activa_mujer;
            $f->planificacion_familiar_mujer=$request->planificacion_familiar_mujer;
            $f->papanicolaou_mujer=$request->papanicolaou_mujer;
            $f->tiempo_papanicolaou_mujer=$request->tiempo_papanicolaou_mujer;
            $f->resultado_papanicolaou_mujer=$request->resultado_papanicolaou_mujer;
            $f->eco_mamario_mujer=$request->eco_mamario_mujer;
            $f->tiempo_eco_mamario_mujer=$request->tiempo_eco_mamario_mujer;
            $f->resultado_eco_mamario_mujer=$request->resultado_eco_mamario_mujer;
            $f->colposcopia_mujer=$request->colposcopia_mujer;
            $f->tiempo_colposcopia_mujer=$request->tiempo_colposcopia_mujer;
            $f->resultado_colposcopia_mujer=$request->resultado_colposcopia_mujer;
            $f->mamografia_mujer=$request->mamografia_mujer;
            $f->tiempo_mamografia_mujer=$request->tiempo_mamografia_mujer;
            $f->resultado_mamografia_mujer=$request->resultado_mamografia_mujer;
            $f->observaciones_mujer=$request->observaciones_mujer;
            
            $f->tabaco=$request->tabaco;

            $f->tiempo_consumo_tabaco=$request->tiempo_consumo_tabaco;
            $f->cantidad_tabaco=$request->cantidad_tabaco;
            $f->exconsumidor_tabaco=$request->exconsumidor_tabaco;
            $f->tiempo_abastecimiento_tabaco=$request->tiempo_abastecimiento_tabaco;
            
            $f->alcohol=$request->alcohol;

            $f->tiempo_consumo_alcohol=$request->tiempo_consumo_alcohol;
            $f->cantidad_alcohol=$request->cantidad_alcohol;
            $f->exconsumidor_alcohol=$request->exconsumidor_alcohol;
            $f->tiempo_abastecimiento_alcohol=$request->tiempo_abastecimiento_alcohol;
            
            $f->otras_drogas=$request->otras_drogas;

            $f->cual_droga=$request->cual_droga;
            $f->tiempo_consumo_otras_drogas=$request->tiempo_consumo_otras_drogas;
            $f->cantidad_otras_drogas=$request->cantidad_otras_drogas;
            $f->exconsumidor_otras_drogas=$request->exconsumidor_otras_drogas;
            $f->tiempo_abastecimiento_otras_drogas=$request->tiempo_abastecimiento_otras_drogas;
            $f->actividad_fisica=$request->actividad_fisica;
            $f->cual_que_actividad_fisica_uno=$request->cual_que_actividad_fisica_uno;
            $f->cual_que_actividad_fisica_dos=$request->cual_que_actividad_fisica_dos;
            $f->tiempo_cantidad_actividad_fisica_uno=$request->tiempo_cantidad_actividad_fisica_uno;
            $f->tiempo_cantidad_actividad_fisica_dos=$request->tiempo_cantidad_actividad_fisica_dos;
            $f->mediacion_habitual=$request->mediacion_habitual;
            $f->cual_que_actividad_mediacion_habitual_uno=$request->cual_que_actividad_mediacion_habitual_uno;
            $f->cual_que_actividad_mediacion_habitual_dos=$request->cual_que_actividad_mediacion_habitual_dos;
            
            $f->tiempo_mediacion_habitual_uno=$request->tiempo_mediacion_habitual_uno;
            $f->tiempo_mediacion_habitual_dos=$request->tiempo_mediacion_habitual_dos;

            $f->alergias=$request->alergias;
            $f->cual_que_alergias_uno=$request->cual_que_alergias_uno;
            $f->cual_que_alergias_dos=$request->cual_que_alergias_dos;
            $f->observacion_estilo_vida=$request->observacion_estilo_vida;
            $f->save();

            if(!$f->testFagerstom_m){
                $test_f=new TestFagerstorm();
                $test_f->ficha_p_i_id=$f->id;
                $test_f->save();
            }
            
        
            if(!$f->testCage_m){
                $test_c=new TestCage();
                $test_c->ficha_p_i_id=$f->id;
                $test_c->save();
            }
            
            if(!count($f->testAsist_m)>0){
                foreach (Pregunta::all() as $p) {
                    $test_a=new TestAsist();
                    $test_a->ficha_p_i_id=$f->id;
                    $test_a->pregunta_id=$p->id;
                    $test_a->codigo=$p->codigo;
                    $test_a->save();
                }
            }
            

            DB::commit();
            if($request->fichaPi_id){
                $request->session()->flash('success','Ficha prelaboral incial, actualizada');    
            }else{
                $request->session()->flash('success','Ficha prelaboral incial, ingresada');
            }
            

            return  redirect()->route('editarFichaPI',$f->id);
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
            $request->session()->flash('info','Ficha prelaboral incial no ingresada, vuelva intentar');
            return  redirect()->route('crearFichaPI',$areaTrabajo->empresa_m->id)->withInput();
            return  redirect()->route('crearFichaPI',$puestoTrabajo2->empresa_m->id)->withInput();
        }

    }


    public function obtenerUsuarioXhistoriaClinica(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        if($u){
            return response()->json($u);
        }
        return response()->json(null);
        
    }


    public function verantecedentesPatologicosClinicos(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        if($u){
            if($request->ficha){
                return $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
            }
            return $u->fichas_m->last()->orderBy('id','desc')->first();
        }
        return response()->json(null);
    }

    public function verantecedentesPatologicosQuirurgicos(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        if($u){
            if($request->ficha){
                return $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
            }
            return $u->fichas_m->last()->orderBy('id','desc')->first();
        }
        return response()->json(null);
    }

    public function verantecedentesPatologicosGineco(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha=$u->fichas_m->last()->orderBy('id','desc')->first();
        if($request->ficha){
            $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        }
        $data = array('ficha' =>$ficha);
        return view('fichas_pi.verantecedentesPatologicosGineco',$data);
    }

    public function verantecedentesReproductivos(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha=$u->fichas_m->last()->orderBy('id','desc')->first();
        if($request->ficha){
            $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        }
     
        $data = array('ficha' =>$ficha);
        return view('fichas_pi.verantecedentesReproductivos',$data);
    }

    public function verHabitosToxicosAnteriores(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha=$u->fichas_m->last()->orderBy('id','desc')->first();
        if($request->ficha){
            $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        }
        $data = array('ficha' =>$ficha);
        return view('fichas_pi.verHabitosToxicosAnteriores',$data);
    }

    public function verEstiloVida(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha=$u->fichas_m->last()->orderBy('id','desc')->first();
        if($request->ficha){
            $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        }
        $data = array('ficha' =>$ficha);
        return view('fichas_pi.verEstiloVida',$data);
    }

    public function verAntecedentesPatologicosFamiliares(Request $request)
    {
        
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        $data = array('patologico'=>$ficha->patologico_m);
        return view('fichas_pi.verAntecedentesPatologicos',$data);
    }

    public function verRevisionActualOrganos(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        $data = array('revision'=>$ficha->revisiones_m);
        return view('fichas_pi.verRevisionActualOrganos',$data);
    }

    public function verConstantresVitales(Request $request)
    {
        $u=User::where('historia_clinica_ci',$request->hc)->first();
        $ficha= $u->fichas_m()->where('id','<',$request->ficha)->orderBy('id','desc')->first();    
        $data = array('constante'=>$ficha->constante_m);
        return view('fichas_pi.verConstantresVitales',$data);
    }

    public function detalle($idFi)
    {
        $fi=FichaPI::findOrFail($idFi);
        $data = array(
            'ficha' => $fi ,
            'test_f'=>$fi->testFagerstom_m,
            'test_c'=>$fi->testCage_m,
            'test_a'=>$fi->testAsist_m
        );
        return view('fichas_pi.detalle',$data);
    }

    public function actualizarTestFagerstom(Request $request)
    {
        
        $test_f=TestFagerstorm::findOrFail($request->test_f);
        $test_f->p_1=$request->p_1;
        $test_f->p_2=$request->p_2;
        $test_f->p_3=$request->p_3;
        $test_f->p_4=$request->p_4;
        $test_f->p_5=$request->p_5;
        $test_f->p_6=$request->p_6;
        $test_f->save();
        $request->aplicarasis_fagerstom;
        $test_f->fichaPI_m->otras_drogas=$request->aplicarasis_fagerstom;
        $test_f->fichaPI_m->save();

        
        return redirect()->route('detalleFichaPI',$test_f->fichaPI_m->id);
    }

    public function actualizarTestCage(Request $request)
    {
        $test_c=TestCage::findOrFail($request->test_c);
        $test_c->p_1=$request->p_1;
        $test_c->p_2=$request->p_2;
        $test_c->p_3=$request->p_3;
        $test_c->p_4=$request->p_4;
        $test_c->save();

        $test_c->fichaPI_m->otras_drogas=$request->aplicarasis_fagerstom;
        $test_c->fichaPI_m->save();

        return redirect()->route('detalleFichaPI',$test_c->fichaPI_m->id);
    }


    public function actualizarTestAsis(Request $request)
    {
        
        foreach ($request->pregunta as $id_t_a => $valor) {
            $t_a=TestAsist::find($id_t_a);
            $t_a->valor=$valor;
            $t_a->save();
        }

        return redirect()->route('detalleFichaPI',$request->ficha);
        
    }

    public function descargarPdfInformeAsis($ficha)
    {
        $data = array('ficha' => FichaPI::find($ficha) );
        $pdf = PDF::loadView('fichas_pi.test.pdfInforme', $data);
        return $pdf->download('Informe de asis.pdf');
    }

    public function editar(EmpresasDataTable $dataTable,$idFicha)
    {
        $ficha=FichaPI::findOrFail($idFicha);
        $data = array('empresa' => $ficha->areaTrabajo_m->empresa_m,'ficha'=>$ficha );
      // $data = array('empresa' => $ficha->puestosTrabajo_m->empresa_m,'ficha'=>$ficha );
        return $dataTable->with('opcion','editar')->render('fichas_pi.editar',$data);
    }
    public function cambiarEmpresaEditarFichaPI(Request $request)
    {
        $ficha=FichaPI::findOrFail($request->ficha);
        $empresa=Empresa::findOrFail($request->empresa);
        $area_t=$empresa->areaTrabajos_m()->first();
        $ficha->area_trabajo_id=$area_t->id;
        ////////////////////////////////////
        $puesto_t=$empresa->areaTrabajos_m()->first();
        $ficha->puesto_trabajo_id=$puesto_t->id;
        ///////////////
        $ficha->save();
        $data = array('url' => route('editarFichaPI', $request->ficha) );
        return response()->json($data);
    }



    


}
