@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nueva Consulta
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'consultas.store', 'files'=>true,'enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <!-- Paciente Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('paciente', 'Paciente:') !!}
                            {{ Form::select('id_paciente', $pacientes, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE', 'required']) }}
                        </div>

                        <!-- Medico Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('medico', 'Médico:') !!}
                            {{ Form::select('id_medico', $medicos, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE', 'required']) }}
                        </div>

                        <!-- Id Enfermedad Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('enfermedad', 'Enfermedad:') !!}
                            {{ Form::select('id_enfermedad', $enfermedads, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE', 'required']) }}
                        </div>

                        <!-- Path Field -->
                        <div class="form-group col-sm-6 col-lg-6">
                            {!! Form::label('path', 'Documento:') !!}
                            <div class="form-group has-feedback"> 
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="input-group">
                                            <label class="btn btn-default" for="path" class="desc-upload"> 
                                                <input id="path" name="path" type="file" class="path file" style="display:none">
                                                <span style="margin-right: 18px;">Subir documento</span>
                                                <span class="glyphicon glyphicon-cloud-upload form-control-feedback"></span>
                                            </label>        
                                        </div>
                                    </div> 
                                    <div class="col-xs-offset-2 col-xs-8" style="margin-left: 65px; padding-top: 5px;">
                                        <div id="info-fields" style="display: none;">
                                            <span  id="info-archivo" class="label label-info" style="font-size: 12px; padding: 10px;">
                                                Documento <span class='glyphicon glyphicon-ok'></span>
                                            </span>
                                            <span  id="borrar-archivo" class="label label-danger" style="font-size: 12px; padding: 10px;">
                                                Borrar <span class='glyphicon glyphicon-trash'></span>
                                            </span>                                            
                                        </div>

                                        <small id="aler-archivo">Tamaño máximo 2 MB</small> 
                                    </div> 
                                </div>
                            </div>
                        </div>                        

                        <!-- Motivo Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('motivo', 'Motivo:') !!}
                            {!! Form::textarea('motivo', null, ['class' => 'form-control editor1']) !!}
                        </div>

                        <!-- Tratamiento Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('tratamiento', 'Tratamiento:') !!}
                            {!! Form::textarea('tratamiento', null, ['class' => 'form-control editor2']) !!}
                        </div> 

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('consultas.index') !!}" class="btn btn-default">Cancelar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">        
        $('#path').click(function() { 
            document.getElementById("path").value = null;
        }); 
        $('#path').change(function() {   
            $('#info-archivo').show();
            $('#borrar-archivo').show();
            $('#info-fields').show();
            $('#aler-archivo').hide(); 
            // validar tamano de archivo
            var fileSize      = document.getElementById("path").files[0].size; 
            var siezekiloByte = parseInt(fileSize / 1024); console.log(siezekiloByte);
            if (siezekiloByte > 2000) {                
                toastr.error('Archivo excede límite de tamaño <br> (2 MB)');
                document.getElementById("path").value = null;
                $('#info-fields').hide(); 
                $('#aler-archivo').show();  
            }            
        });         
        $('#borrar-archivo').click(function() {  
            document.getElementById("path").value = null;
            $('#info-fields').hide(); 
            $('#aler-archivo').show();
        });                    
        $('#borrar-archivo').css('cursor','pointer');  
        ClassicEditor.create(document.querySelector('.editor1')).catch(error=>{console.error(error);});
        ClassicEditor.create(document.querySelector('.editor2')).catch(error=>{console.error(error);});
    </script>
@endsection