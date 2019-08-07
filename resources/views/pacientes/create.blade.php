@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paciente
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pacientes.store']) !!}

                        <!-- Dni Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('dni', 'DNI:') !!}
                            {!! Form::text('dni', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Nombre Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('nombre', 'Nombre:') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Apellido Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('apellido', 'Apellido:') !!}
                            {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Fecha Nac Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('fecha_nac', 'Fecha Nac.:') !!}
                            {!! Form::date('fecha_nac', null, ['class' => 'form-control','id'=>'fecha_nac']) !!}
                        </div>

                        @section('scripts')
                            <script type="text/javascript">
                                $('#fecha_nac').datetimepicker({
                                    format: 'YYYY-MM-DD',
                                    useCurrent: true
                                })
                            </script>
                        @endsection

                        <!-- Direccion Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('direccion', 'Dirección Residencia:') !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('pacientes.index') !!}" class="btn btn-default">Cancelar</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
