@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Gestión Especialidad</h1>
        <h1 class="pull-right"> <!--
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('medicoEspecialidads.create') !!}">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;Nueva Asignación
            </a> -->
           <button type="button btn-show-modal" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-medico-esp" style="margin-top: -10px;margin-bottom: 5px" >
                <span class="glyphicon glyphicon-plus"></span>&nbsp;Nueva Asignación
            </button>             
        </h1>
    </section> 
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" v-cloak>
                @include('medico_especialidads.table')
                @include('medico_especialidads.modal')                    
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.btn-show-modal').click(function() { 
            console.log("click modal");      
        });                  
    </script>
@endsection

