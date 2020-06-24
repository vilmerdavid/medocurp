<?php

namespace App\Http\Controllers;

use App\DataTables\FichasPI\EmpresasDataTable;
use Illuminate\Http\Request;

class FichasPI extends Controller
{
    public function crear(EmpresasDataTable $dataTable)
    {
        return $dataTable->render('fichas_pi.crear');
    }
}
