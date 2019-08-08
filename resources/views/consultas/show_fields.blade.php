<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $consulta->created_at !!}</p>
</div>

<!-- Enfermedad Field -->
<div class="form-group">
    {!! Form::label('id_enfermedad', 'Enfermedad:') !!}
    <p>{!! $consulta->enfermedad->nombre !!}</p>
</div>

<!-- Paciente Field -->
<div class="form-group">
    {!! Form::label('paciente', 'Paciente:') !!}
    <p>{!! $consulta->paciente_medico->paciente->nombre !!}</p>
</div>


<!-- Medico Field -->
<div class="form-group">
    {!! Form::label('medico', 'Médico:') !!}
    <p>{!! $consulta->paciente_medico->medico->nombre !!}</p>
</div>

<!-- Motivo Field -->
<div class="form-group">
    {!! Form::label('motivo', 'Motivo:') !!}
    <p>{!! $consulta->motivo !!}</p>
</div>

<!-- Tratamiento Field -->
<div class="form-group">
    {!! Form::label('tratamiento', 'Tratamiento:') !!}
    <p>{!! $consulta->tratamiento !!}</p>
</div>
