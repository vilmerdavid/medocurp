<?php

namespace App\Http\Controllers;
use App\DataTables\PuestosTrabajosDataTable;
use App\DataTables\AreasTrabajosDataTable;
use App\DataTables\EmpresasDataTable;
use App\Models\AreaTrabajo;
use App\Models\PuestoTrabajo;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Empresas extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(EmpresasDataTable $dataTable)
    {
        return $dataTable->render('empresas.index');
    }
    public function crear()
    {
        return view('empresas.crear');
    }

    public function guardar(Request $request)
    {
        if($request->empresa){
            $rq_nombre='required|string|max:255|unique:empresas,nombre,'.$request->empresa;
        }else{
            $rq_nombre='required|string|max:255|unique:empresas';
        }

        $request->validate([
            'empresa'=>'nullable',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'version'=>'required|string|max:255',
            'codigo'=>'required|string|max:255',
            'nombre'=>$rq_nombre,
            'ruc'=>'required|string|max:255',
            'ciiu'=>'required|string|max:255',
            'establecimiento'=>'required|string|max:255',
        ]);

        if($request->empresa){
            $emp=Empresa::findOrFail($request->empresa);
        }else{
            $emp=new Empresa();
        }
        
        $emp->logo='';
        
        $emp->version=$request->version;
        $emp->codigo=$request->codigo;
        $emp->nombre=$request->nombre;
        $emp->ruc=$request->ruc;
        $emp->ciiu=$request->ciiu;
        $emp->establecimiento=$request->establecimiento;
        $emp->save();

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $extension = $request->logo->extension();
                Storage::delete($emp->logo);
                $path = Storage::putFileAs(
                    'public/empresas', $request->file('logo'), $emp->id.'.'.$extension
                );
                $emp->logo=$path;
                $emp->save();
            }
        }
        
        if($request->empresa){
            $request->session()->flash('success','Empresa actualizada');
        }else{
            $request->session()->flash('success','Empresa ingresada');
        }

        
        return redirect()->route('empresas');
    }

   

    public function areas(AreasTrabajosDataTable $dataTable, $idEmp)
    {
        $empresa=Empresa::findOrFail($idEmp);
        $data = array('emp' => $empresa );
        return $dataTable->with('idEmp',$idEmp)->render('empresas.areas',$data);
    }

    public function guardarArea(Request $request)
    {
        $request->validate([
            'nombre'=>'required|string|max:255',
        ]);
        $area=new AreaTrabajo();
        $area->nombre=$request->nombre;
        $area->empresa_id=$request->empresa;
        $area->save();
        $request->session()->flash('success','Area de trabajo ingresada');
        return redirect()->route('areas',$request->empresa);
    }

    public function editar($idEmp)
    {
        $emp=Empresa::findOrFail($idEmp);
        $data = array('emp' => $emp );
        return view('empresas.editar',$data);
    }


    public function eliminarArea(Request $request,$idArea)
    {
        $area=AreaTrabajo::findOrFail($idArea);
        try {
            $area->delete();
            $request->session()->flash('success','Área de trabajo eliminada');
        } catch (\Throwable $th) {
            $request->session()->flash('info','Área de trabajo no eliminada');
        }
        return redirect()->route('areas',$area->empresa_m->id);
    }
    //puestos de trabajo
    public function puestos(PuestosTrabajosDataTable $dataTable, $idEmp)
    {
        $empresa=Empresa::findOrFail($idEmp);
        $data = array('emp' => $empresa );
        return $dataTable->with('idEmp',$idEmp)->render('empresas.puestos',$data);
    }

    public function guardarPuesto(Request $request)
    {
        $request->validate([
            'nombre'=>'required|string|max:255',
        ]);
        $puesto=new PuestoTrabajo();
        $puesto->nombre=$request->nombre;
        $puesto->empresa_id=$request->empresa;
        $puesto->save();
        $request->session()->flash('success','Puesto de trabajo ingresada');
        return redirect()->route('puestos',$request->empresa);
    }

 


    public function eliminarPuesto(Request $request,$idPuesto)
    {
        $puesto=PuestoTrabajo::findOrFail($idPuesto);
        try {
            $puesto->delete();
            $request->session()->flash('success','Puesto de trabajo eliminada');
        } catch (\Throwable $th) {
            $request->session()->flash('info','Puesto de trabajo no eliminada');
        }
        return redirect()->route('puestos',$puesto->empresa_mt->id);
    }
    public function eliminar(Request $request,$idEmp)
    {
        try {
            Empresa::destroy($idEmp);
            $request->session()->flash('success','Empresa eliminada');
        } catch (\Throwable $th) {
            $request->session()->flash('info','No se puede eliminar empresa');
        }
        return redirect()->route('empresas');
    }
}
