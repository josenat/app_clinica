@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Medico  Especialidad
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medicoEspecialidad, ['route' => ['medicoEspecialidads.update', $medicoEspecialidad->id], 'method' => 'patch']) !!}

                        @include('medico_especialidads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection