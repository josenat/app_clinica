@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cita
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cita, ['route' => ['citas.update', $cita->id], 'method' => 'patch']) !!}

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

                      <!-- Fecha Cita Field -->
                      <div class="form-group col-sm-6">
                          {!! Form::label('fecha_cita', 'Fecha Cita:') !!}
                          {!! Form::text('fecha_cita', null, ['class'=>'form-control','id'=>'fecha_cita']) !!}
                      </div>

                      <!-- Hora Cita Field -->
                      <div class="form-group col-sm-6">
                          {!! Form::label('hora', 'Hora Cita:') !!}
                          {!! Form::hidden('hora', null, ['id' => 'hora']) !!} 
                          <vue-clock-picker v-model="newHora" active-color="#1284e7" color="#1284e7" cancel-text="Cancelar" done-text="Aceptar" input-class="form-control text-center" :onTimeChange="timeChange()" required></vue-clock-picker>     
                      </div>

                      <!-- Observacion Field -->
                      <div class="form-group col-sm-12 col-lg-12">
                          {!! Form::label('observacion', 'Observación:') !!}
                          {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
                      </div>

                      <!-- Submit Field -->
                      <div class="form-group col-sm-12">
                          {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'id' => 'btn-guardar',]) !!}
                          <a href="{!! route('citas.index') !!}" class="btn btn-default">Cancelar</a>
                      </div>

                      @section('scripts')
                          <script type="text/javascript">
                              $('#fecha_cita').datetimepicker({ 
                                  format: 'DD-MM-YYYY',
                                  //useCurrent: false                   
                              });                  
                          </script>
                      @endsection

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection