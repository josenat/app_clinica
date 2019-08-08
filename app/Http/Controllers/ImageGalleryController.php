<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageGallery;
use App\Models\Consulta;
use App\Models\PacienteMedico;
use App\Models\Paciente;
use App\Models\Medico;
use Flash;


class ImageGalleryController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $pacientes = Paciente::pluck('nombre', 'id');
        $medicos   = Medico::pluck('nombre', 'id'); 
        // por defecto buscar por la primera consulta que exista
        $consulta  = Consulta::first();
        $images    = ImageGallery::where('id_consulta',$consulta->id)->get();
    	
    	return view('image-gallery',compact('images','pacientes','medicos'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

		if ($request{'id_consulta'} > 0) {

			$input['id_consulta'] = $request{'id_consulta'};
			
	        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
	        $request->image->move(public_path('images'), $input['image']);


	        $input['title'] = $request->title;
	        ImageGallery::create($input);


	    	return back()
	    		->with('success','Image Uploaded successfully.');

		}

    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
    	ImageGallery::find($id)->delete();

        Flash::success('Image removed successfully.');

        return redirect(route('image-gallery.index'));    
    }


    public function showbypaciente(Request $request)
    {
    	$id              = $request{'id_paciente'};
    	$paciente        = Paciente::find($id);
        $pacientes       = Paciente::pluck('nombre', 'id');        
        $pacientes->prepend($paciente->nombre, $id);
        $medicos         = Medico::pluck('nombre', 'id'); 
        $paciente_medico = PacienteMedico::where('id_paciente','=',$id)->get();  
        $consulta        = Consulta::whereIn('id_paciente_med', $paciente_medico)->get();  
        $images          = ImageGallery::whereIn('id_consulta', $consulta)->get(); 
        $recurso         = "paciente";
    	
    	return view('image-gallery', compact('images','pacientes','medicos', 'recurso'));
    }    


    public function showbymedico(Request $request)
    {
    	$id              = $request{'id_medico'};
    	$medico          = Medico::find($id);
        $medicos         = Medico::pluck('nombre', 'id');        
        $medicos->prepend($medico->nombre, $id);
        $pacientes       = Paciente::pluck('nombre', 'id');
        $paciente_medico = PacienteMedico::where('id_medico','=',$id)->get();
        $consulta        = Consulta::whereIn('id_paciente_med', $paciente_medico)->get();
        $images          = ImageGallery::whereIn('id_consulta', $consulta)->get();
        $recurso         = "medico";
    	
    	return view('image-gallery', compact('images','medicos','pacientes', 'recurso'));
    }        
}