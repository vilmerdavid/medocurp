<?php

namespace App\Http\Controllers;

use App\DataTables\AreasTrabajosDataTable;
use App\DataTables\EmpresasDataTable;
use App\Models\AreaTrabajo;
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
        $request->validate([
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'version'=>'required|string|max:255',
            'codigo'=>'required|string|max:255',
            'nombre'=>'required|string|max:255|unique:empresas',
            'ruc'=>'required|string|max:255',
            'ciiu'=>'required|string|max:255',
            'establecimiento'=>'required|string|max:255',
        ]);
        $emp=new Empresa();
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
        $request->session()->flash('success','Empresa ingresado');
        return redirect()->route('empresas');
    }

    public function eliminar(Request $request,$idEmp)
    {
        try {
            Empresa::destroy($idEmp);
            $request->session()->flash('success','Empresa eliminado');
        } catch (\Throwable $th) {
            $request->session()->flash('info','No se puede eliminar empresa');
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
        $request->session()->flash('success','Area de trabajo ingresado');
        return redirect()->route('areas',$request->empresa);
    }

    public function editar($idEmp)
    {
        $emp=Empresa::findOrFail($idEmp);
        $data = array('emp' => $emp );
        return view('empresas.editar',$data);
    }
}
