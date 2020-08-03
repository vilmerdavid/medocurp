<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// datos accer
Route::get('/obtener-antecedentes-hombre/{ficha?}', 'HomeController@cargarAntecedentesHombre')->name('cargarAntecedentesHombre');
Route::get('/obtener-antecedentes-mujer/{ficha?}', 'HomeController@cargarAntecedentesMujer')->name('cargarAntecedentesMujer');




// De: rutas para empresa y areas
Route::get('/empresas', 'Empresas@index')->name('empresas');
Route::get('/crear-empresa', 'Empresas@crear')->name('crearEmmpresa');
Route::post('/guardar-empresa', 'Empresas@guardar')->name('guardarEmpresa');
Route::get('/eliminar-empresa/{id}', 'Empresas@eliminar')->name('eliminarEmpresa');
Route::get('/editar-empresa/{id}', 'Empresas@editar')->name('editarEmpresa');
Route::get('/areas/{empresa}', 'Empresas@areas')->name('areas');
Route::post('/guardar-area', 'Empresas@guardarArea')->name('guardarArea');
Route::get('/eliminar-area/{area}', 'Empresas@eliminarArea')->name('eliminarArea');

// rutas para fichas prelaboral inicial
Route::get('/crear-ficha-prelaboral-inicial/{empresa}', 'FichasPI@crear')->name('crearFichaPI');
Route::post('/guardar-ficha-prelaboral-inicial', 'FichasPI@guardar')->name('guardarFichaPI');
Route::get('/detalle-ficha-prelaboral-inicial/{id}', 'FichasPI@detalle')->name('detalleFichaPI');
Route::post('/actualizar-test-fagerstom', 'FichasPI@actualizarTestFagerstom')->name('actualizarTestFagerstom');
Route::post('/actualizar-test-cage', 'FichasPI@actualizarTestCage')->name('actualizarTestCage');
Route::post('/actualizar-test-asi', 'FichasPI@actualizarTestAsis')->name('actualizarTestAsis');
Route::get('/fichas-prelaborales-iniciales', 'FichasPI@index')->name('fichas');
Route::get('/descargar-pdf-informe-asis/{ficha}', 'FichasPI@descargarPdfInformeAsis')->name('descargarPdfInformeAsis');
Route::get('/editar-ficha-p-i/{ficha}', 'FichasPI@editar')->name('editarFichaPI');
Route::post('/cambiar-empresa-editar-ficha-p-i', 'FichasPI@cambiarEmpresaEditarFichaPI')->name('cambiarEmpresaEditarFichaPI');
Route::get('/obtener-antecedentes-patologicos-clinicos-anteriores', 'FichasPI@obtenerAntecedentesPatologicosClinicos')->name('obtenerAntecedentesPatologicosClinicos');
Route::post('/obtener-usuario-x-historia-clinica', 'FichasPI@obtenerUsuarioXhistoriaClinica')->name('obtenerUsuarioXhistoriaClinica');
Route::post('/verantecedentes-patologicos-clinicos', 'FichasPI@verantecedentesPatologicosClinicos')->name('verantecedentesPatologicosClinicos');
Route::post('/verantecedentes-patologicos-quirurgicos', 'FichasPI@verantecedentesPatologicosQuirurgicos')->name('verantecedentesPatologicosQuirurgicos');
Route::post('/verantecedentes-patologicos-gineco', 'FichasPI@verantecedentesPatologicosGineco')->name('verantecedentesPatologicosGineco');
Route::post('/verantecedentes-reproductivos', 'FichasPI@verantecedentesReproductivos')->name('verantecedentesReproductivos');

// rutas para antecedentes de trabajo
Route::get('/antecedentes-trabajo/{ficha}', 'AntecedentesTrabajo@index')->name('antecedentesTrabajo');
Route::post('/antecedentes-trabajo-guardar', 'AntecedentesTrabajo@guardar')->name('guardarAntecedenteTrabajo');
Route::post('/antecedentes-trabajo-actualizar', 'AntecedentesTrabajo@actualizar')->name('actualizarAntecedenteTrabajo');
Route::post('/actualizar-nea', 'AntecedentesTrabajo@actualizarNea')->name('actualizarNea');
Route::get('/eliminar-antecedente-laboral/{id}', 'AntecedentesTrabajo@eliminar')->name('eliminarAntecedenteLaboral');
Route::post('/actualizar-accidente-enfermedad', 'AntecedentesTrabajo@actualizarAccidenteEnfermedad')->name('actualizarAccidenteEnfermedad');

// rutas para antecednetes patologicos
Route::get('/antecedentes-patologicos/{ficha}', 'Patologicos@index')->name('antecedentesPatologicos');
Route::post('/antecedentes-patologicos-guardar', 'Patologicos@guardar')->name('actualizarPatologico');

// factores de riesgos
Route::get('/factores-riesgos/{ficha}', 'Riesgos@index')->name('factoresRiesgos');
Route::post('/factores-riesgos-guardar', 'Riesgos@guardar')->name('factoresRiesgosGuardar');
Route::post('/factores-riesgos-actualizar', 'Riesgos@actualizar')->name('actualizarFactorItems');
Route::get('/factores-riesgos-eliminar/{factor}', 'Riesgos@eliminar')->name('eliminarFactor');
Route::get('/actividades-extralaborales/{ficha}', 'Actividades@index')->name('actividadesExtralaborales');
Route::post('/guardar-actividades-extralaborales', 'Actividades@guardar')->name('guardaractividadesExtralaborales');
Route::post('/actualizar-actividades-extralaborales', 'Actividades@actualizar')->name('actualizaractividadesExtralaborales');
Route::get('/actividades-extralaborales-eliminar/{id}', 'Actividades@eliminar')->name('eliminarActividadExtralaboral');
Route::post('/actualizar-enfermedad-actual', 'Actividades@ActualizarEnfermedadActual')->name('ActualizarEnfermedadActual');


// revision Organos Sistemas
Route::get('/revision-organos-sistemas/{ficha}', 'Revisiones@index')->name('revisionOrganosSistemas');
Route::post('/revision-organos-sistemas-actualizar', 'Revisiones@actualizar')->name('actualizarRevisionOrganosSistemas');


// contantes
Route::get('/constantes/{ficha}', 'Constantes@index')->name('constantes');
Route::post('/actualizar-contantes', 'Constantes@actualizar')->name('actualizarContantes');

// examens fisicos
Route::post('/actualizar-examen_fisico', 'Constantes@actualizarExamenFisico')->name('actualizarExamenFisico');
// resulktado de examenes generales
Route::get('/resultados-examenes-generales/{ficha}', 'ResultadosGenerales@index')->name('resultadosGenerales');
Route::post('/actualizar-resultados-examenes-generales', 'ResultadosGenerales@actualizar')->name('actualizarResultadosGenerales');

// diagnostico
Route::get('/diagnosticos/{ficha}', 'Diagnosticos@index')->name('diagnosticos');
Route::post('/diagnosticos-guardar', 'Diagnosticos@guardar')->name('guardarDiagnostico');
Route::post('/diagnosticos-actualizar', 'Diagnosticos@actualizar')->name('actualizarDiagnostico');
Route::get('/diagnosticos-eliminar/{dg}', 'Diagnosticos@eliminar')->name('eliminarDiagnostico');

// aptitudes medicas
Route::get('/aptitudes-medicas/{ficha}', 'AptitudesMedicas@index')->name('aptitudesMedicas');
Route::post('/aptitudes-medicas-guardar', 'AptitudesMedicas@actualizar')->name('actualizarAptitud');
Route::post('/guardar-recomendacion', 'AptitudesMedicas@guardarRecomendacion')->name('guardarRecomendacion');
Route::post('/actualizar-recomendacion', 'AptitudesMedicas@actualizarRecomendacion')->name('actualizarRecomendacion');
Route::get('/eliminar-recomendacion/{recomendacion}', 'AptitudesMedicas@eliminarRecomendacion')->name('eliminarRecomendacion');

// scores
Route::get('/scores/{ficha}', 'Scores@index')->name('scores');
Route::post('/scores-actualizar', 'Scores@actualizarScore')->name('actualizarScore');
Route::get('/certificado-medico/{ficha}', 'Scores@certificadoMedico')->name('certificadoMedico');
Route::get('/descargar-certificado/{ficha}', 'Scores@descargarCertificado')->name('descargarCertificado');
Route::post('/actualizar-certificadomedico', 'Scores@actualizarCertificadoMedico')->name('actualizarCertificadoMedico');





