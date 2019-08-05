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

                        @include('consultas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection