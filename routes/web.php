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
Route::get('/obtener-antecedentes-hombre', 'HomeController@cargarAntecedentesHombre')->name('cargarAntecedentesHombre');
Route::get('/obtener-antecedentes-mujer', 'HomeController@cargarAntecedentesMujer')->name('cargarAntecedentesMujer');




// De: rutas para empresa y areas
Route::get('/empresas', 'Empresas@index')->name('empresas');
Route::get('/crear-empresa', 'Empresas@crear')->name('crearEmmpresa');
Route::post('/guardar-empresa', 'Empresas@guardar')->name('guardarEmpresa');
Route::get('/eliminar-empresa/{id}', 'Empresas@eliminar')->name('eliminarEmpresa');
Route::get('/editar-empresa/{id}', 'Empresas@editar')->name('editarEmpresa');
Route::get('/areas/{empresa}', 'Empresas@areas')->name('areas');
Route::post('/guardar-area', 'Empresas@guardarArea')->name('guardarArea');

// rutas para fichas prelaboral inicial
Route::get('/crear-ficha-prelaboral-inicial/{empresa}', 'FichasPI@crear')->name('crearFichaPI');
Route::post('/guardar-ficha-prelaboral-inicial', 'FichasPI@guardar')->name('guardarFichaPI');
Route::get('/detalle-ficha-prelaboral-inicial/{id}', 'FichasPI@detalle')->name('detalleFichaPI');
Route::post('/actualizar-test-fagerstom', 'FichasPI@actualizarTestFagerstom')->name('actualizarTestFagerstom');
Route::post('/actualizar-test-cage', 'FichasPI@actualizarTestCage')->name('actualizarTestCage');

