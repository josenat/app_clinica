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

Route::get('/', function() {   
    // si el usuario está logueado
    if (Auth::check()) {  
        return redirect()->action('HomeController@index'); 
    }
    // si no está logueado lo enviamos a la vista de inicio de sesión
    return redirect('/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('medicos', 'MedicoController');

Route::resource('especialidads', 'EspecialidadController');

Route::resource('medicoEspecialidads', 'MedicoEspecialidadController');

Route::resource('pacientes', 'PacienteController');

Route::resource('pacienteMedicos', 'PacienteMedicoController');

Route::resource('enfermedads', 'EnfermedadController');

Route::resource('consultas', 'ConsultaController');

Route::resource('citas', 'CitaController');

Route::resource('documentos', 'DocumentoController');