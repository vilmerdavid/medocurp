<?php

namespace App\Http\Controllers;

use App\DataTables\FichasPI\EmpresasDataTable;
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
    public function index(EmpresasDataTable $dataTable)
    {
        return $dataTable->render('home');
    }

    // cargar antecedentes de hombre en crear ficha prelaboral inicila
    public function cargarAntecedentesHombre()
    {
        return view('fichas_pi.cargarAntecedentesHombre');
    }
    // cargar antecedentes de mujer en crear ficha prelaboral inicila
    public function cargarAntecedentesMujer()
    {
        return view('fichas_pi.cargarAntecedentesMujer');
    }
}
