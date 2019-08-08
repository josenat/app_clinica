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

// ******************** Controladores de recursos *******************

Route::resource('medicos', 'MedicoController');

Route::resource('especialidads', 'EspecialidadController');

Route::resource('medicoEspecialidads', 'MedicoEspecialidadController');

Route::resource('pacientes', 'PacienteController');

Route::resource('pacienteMedicos', 'PacienteMedicoController');

Route::resource('enfermedads', 'EnfermedadController');

Route::resource('consultas', 'ConsultaController');

Route::resource('citas', 'CitaController');

Route::resource('documentos', 'DocumentoController');

// *******************************************************************
/*
Route::get('image-gallery', 'ImageGalleryController@index');

Route::post('image-gallery-destroy/{id}', 'ImageGalleryController@destroy');

Route::post('image-gallery', 'ImageGalleryController@upload');
*/
Route::post('image-show-by-paciente', 'ImageGalleryController@showbypaciente');

Route::post('image-show-by-medico', 'ImageGalleryController@showbymedico');

Route::resource('image-gallery', 'ImageGalleryController');