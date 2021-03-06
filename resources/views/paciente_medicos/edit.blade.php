@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paciente  Medico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pacienteMedico, ['route' => ['pacienteMedicos.update', $pacienteMedico->id], 'method' => 'patch']) !!}

                        @include('paciente__medicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection