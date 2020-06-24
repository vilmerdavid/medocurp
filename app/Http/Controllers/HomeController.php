<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function obtenerEmpresa($idEmp)
    {
        $empresa=Empresa::findOrFail($idEmp);
        $data = array('emp' => $empresa );
        return view('fichas_pi.datos_empresa',$data);
    }

    public function cargarAntecedentesHombre()
    {
        return view('fichas_pi.cargarAntecedentesHombre');
    }
    public function cargarAntecedentesMujer()
    {
        return view('fichas_pi.cargarAntecedentesMujer');
    }
}
