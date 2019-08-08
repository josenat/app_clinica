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
                            {{ Form::select('id_paciente', $pacientes, null, ['class' => 'form-control']) }}
                        </div>

                        <!-- Medico Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('medico', 'Médico:') !!}
                            {{ Form::select('id_medico', $medicos, null, ['class' => 'form-control']) }}
                        </div>

                        <!-- Id Enfermedad Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('id_enfermedad', 'Enfermedad:') !!}
                            {{ Form::select('id_enfermedad', $enfermedads, null, ['class' => 'form-control']) }}
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
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('consultas.index') !!}" class="btn btn-default">Cancelar</a>
                        </div>

                       {!! Form::close() !!}
               </div>
                <br><h4><span class="glyphicon glyphicon-picture"></span> Anexar imágen</h4><hr>
               <div class="row" style="background-color: #D9E1E4">
                        <div class="container-fluid">
                        <form action="{{ url('image-gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data"><br>
                            {!! csrf_field() !!}
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif  
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <strong>N° Consulta:</strong>
                                    <input type="text" name="id_consulta" class="form-control" value="{{ $consulta->id }}" readonly="">
                                </div>                              
                                <div class="form-group col-sm-5">
                                    <strong>Título:</strong>
                                    <input type="text" name="title" class="form-control input-title" placeholder="Escriba un título de imágen">
                                </div>
                                <div class="form-group col-sm-5">
                                    <strong>Imágen:</strong>
                                    <input type="file" name="image" class="form-control input-image">
                                </div>
                                <div class="form-group col-sm-4">
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-save-file">Guardar</button>
                                </div>
                                
                            </div> 
                        </form>
                        </div>                 
               </div>
           </div>
       </div>
   </div>
@endsection


@section('scripts')
    <script type="text/javascript">                
        ClassicEditor.create(document.querySelector('.editor1')).catch(error=>{console.error(error);});
        ClassicEditor.create(document.querySelector('.editor2')).catch(error=>{console.error(error);});
    </script>
@endsection