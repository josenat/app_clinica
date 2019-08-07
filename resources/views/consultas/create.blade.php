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
                    {!! Form::open(['route' => 'consultas.store', 'files'=>true]) !!}
                        <!-- Paciente Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('paciente', 'Paciente:') !!}
                            {{ Form::select('id_paciente', $pacientes, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
                        </div>

                        <!-- Medico Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('medico', 'Médico:') !!}
                            {{ Form::select('id_medico', $medicos, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
                        </div>

                        <!-- Id Enfermedad Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('enfermedad', 'Enfermedad:') !!}
                            {{ Form::select('id_enfermedad', $enfermedads, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
                        </div>

                        <!-- Path Field -->
                        <div class="form-group col-sm-6 col-lg-6">
                            {!! Form::label('path', 'Documento:') !!}
                            <div class="form-group has-feedback"> 
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="input-group">
                                            <label class="btn btn-default" for="path" class="desc-upload"> 
                                                <input id="path" name="path" type="file" class="path file" style="display:none" onClick="this.form.reset()">
                                                <span style="margin-right: 18px;">Subir documento</span>
                                                <span class="glyphicon glyphicon-cloud-upload form-control-feedback"></span>
                                            </label>        
                                        </div>
                                    </div> 
                                    <div class="col-xs-offset-2 col-xs-8" style="margin-left: 65px; padding-top: 5px;">
                                        <span  id="info-archivo" class="label label-info" style="font-size: 12px; padding: 10px;"></span>
                                        <small id="aler-archivo">Tamaño máximo 2 MB</small> 
                                    </div> 
                                </div>
                            </div>
                        </div>                        

                        <!-- Motivo Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('motivo', 'Motivo:') !!}
                            {!! Form::textarea('motivo', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Tratamiento Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('tratamiento', 'Tratamiento:') !!}
                            {!! Form::textarea('tratamiento', null, ['class' => 'form-control']) !!}
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
        $('#path').change(function() {  
            $('#info-archivo').html("Documento cargado <span class='glyphicon glyphicon-ok'></span>");
        });
        $('#path').click(function() {  
            $('#info-archivo').html("");
        });                    
    </script>
@endsection