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
