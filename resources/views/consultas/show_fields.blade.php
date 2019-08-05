<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $consulta->id !!}</p>
</div>

<!-- Id Paciente Med Field -->
<div class="form-group">
    {!! Form::label('id_paciente_med', 'Id Paciente Med:') !!}
    <p>{!! $consulta->id_paciente_med !!}</p>
</div>

<!-- Id Enfermedad Field -->
<div class="form-group">
    {!! Form::label('id_enfermedad', 'Id Enfermedad:') !!}
    <p>{!! $consulta->id_enfermedad !!}</p>
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

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $consulta->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $consulta->updated_at !!}</p>
</div>

