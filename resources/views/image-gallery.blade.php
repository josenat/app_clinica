
@section('css')
    <style type="text/css">
    .gallery {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon {
        border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload {
        background: none repeat scroll 0 0;
        padding: 12px;
    }
    </style>
@endsection


@extends('layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            Imágenes Consultas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">  
                        <div class="container-fluid">
                            <h4 class="">Buscar imágenes por:</h4> 
                        </div>

                        <div class="container-fluid" style="margin-top: -20px;">
                        <form action="{{ url('image-show-by-paciente') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            <div class="row">
                                <!-- Paciente Field -->
                                <div class="form-group col-sm-offset-2 col-sm-8 ">
                                    {!! Form::label('paciente', 'Paciente:') !!}
                                    {{ Form::select('id_paciente', $pacientes, null, ['id'=>'input_pacientes','class' => 'form-control', 'required']) }}
                                    <div class="text-right">
                                        <button style="margin-top: 5px;" type="submit" class="btn btn-primary btn-buscar">Buscar <span class="glyphicon glyphicon-search"></span></button>
                                    </div>                                    
                                </div> 
                            </div>                    
                        </form> 



                        <form action="{{ url('image-show-by-medico') }}" class="form-image-upload" method="GET" enctype="multipart/form-data" style="margin-top: -30px;">
                            {!! csrf_field() !!}
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            <div class="row">
                                <!-- Medico Field -->
                                <div class="form-group col-sm-offset-2 col-sm-8 ">
                                    {!! Form::label('medico', 'Médico:') !!}
                                    {{ Form::select('id_medico', $medicos, null, ['id'=>'input_medicos','class' => 'form-control', 'required']) }}
                                    <div class="text-right">
                                        <button style="margin-top: 5px;" type="submit" class="btn btn-primary btn-buscar">Buscar <span class="glyphicon glyphicon-search"></span></button>
                                    </div>
                                </div> 
                            </div>                    

                        </form> 






                        <div class="row">
                        <div class='list-group gallery'>
                                @if($images->count())
                                    @foreach($images as $image)
                                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                        <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                                            <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />
                                            <div class='text-center'>
                                                <small class='text-muted'>{{ $image->title }}</small>
                                            </div> <!-- text-center / end -->
                                        </a>
                                        {!! Form::open(['route' => ['image-gallery.destroy', $image->id], 'method' => 'delete']) !!}
                                        
                                        {!! csrf_field() !!}
                                        <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                        {!! Form::close() !!}
                                    </div> <!-- col-6 / end -->
                                    @endforeach
                                @endif
                            </div> <!-- list-group / end -->
                        </div> <!-- row / end -->
                        </div> <!-- container / end -->
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">        
        $(document).ready(function() {   

            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        }); 
    </script>
@endsection


<!--   <input type="hidden" name="_method" value="post">     -->