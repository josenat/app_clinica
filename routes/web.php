<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('enfermedads', 'EnfermedadController');

Route::resource('medicos', 'MedicoController');

Route::resource('pacientes', 'PacienteController');

Route::resource('especialidads', 'EspecialidadController');

Route::resource('diagnosticos', 'DiagnosticoController');

Route::resource('pacienteMedicos', 'Paciente_MedicoController');

Route::resource('medicoEspecialidads', 'Medico_EspecialidadController');

Route::resource('consultas', 'ConsultaController');

Route::resource('consultas', 'ConsultaController');

Route::resource('citas', 'CitaController');

Route::resource('documentos', 'DocumentoController');