<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cita->id !!}</p>
</div>

<!-- Id Paciente Med Field -->
<div class="form-group">
    {!! Form::label('id_paciente_med', 'Id Paciente Med:') !!}
    <p>{!! $cita->id_paciente_med !!}</p>
</div>

<!-- Fecha Cita Field -->
<div class="form-group">
    {!! Form::label('fecha_cita', 'Fecha Cita:') !!}
    <p>{!! $cita->fecha_cita !!}</p>
</div>

<!-- Observacion Field -->
<div class="form-group">
    {!! Form::label('observacion', 'Observación:') !!}
    <p>{!! $cita->observacion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cita->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cita->updated_at !!}</p>
</div>

