@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consulta
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consulta, ['route' => ['consultas.update', $consulta->id], 'method' => 'patch']) !!}

                    <!-- Paciente Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('paciente', 'Paciente:') !!}
                        {{ Form::select('id_paciente', $consulta->paciente_medico->id_paciente, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
                    </div>

                    <!-- Medico Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('medico', 'Médico:') !!}
                        {{ Form::select('id_medico', $medicos, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
                    </div>

                    <!-- Id Enfermedad Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('id_enfermedad', 'Id Enfermedad:') !!}
                        {!! Form::number('id_enfermedad', null, ['class' => 'form-control']) !!}
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

                    <!-- Documento Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        <div class="form-group has-feedback"> 
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="input-group">
                                        <label class="btn btn-default" for="path" > 
                                            <input id="path" name="path" type="file" class="path file" style="display:none">
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