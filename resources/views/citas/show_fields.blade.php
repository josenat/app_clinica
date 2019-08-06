<!-- Paciente Field -->
<div class="form-group">
    {!! Form::label('paciente', 'Paciente:') !!}
    <p>{!! $cita->paciente_medico->paciente->nombre !!}</p>
</div>


<!-- Medico Field -->
<div class="form-group">
    {!! Form::label('medico', 'Médico:') !!}
    <p>{!! $cita->paciente_medico->medico->nombre !!}</p>
</div>

<!-- Fecha Cita Field -->
<div class="form-group">
    {!! Form::label('fecha_cita', 'Fecha Cita:') !!}
    <p>{!! $cita->fecha_cita !!}</p>
</div>

<!-- Hora Cita Field -->
<div class="form-group">
    {!! Form::label('hora_cita', 'Hora Cita:') !!}
    <p>{!! $cita->hora_cita !!}</p>
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

