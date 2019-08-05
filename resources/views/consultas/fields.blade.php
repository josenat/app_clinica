<!-- Id Paciente Med Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_paciente_med', 'Id Paciente Med:') !!}
    {!! Form::number('id_paciente_med', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Enfermedad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_enfermedad', 'Id Enfermedad:') !!}
    {!! Form::number('id_enfermedad', null, ['class' => 'form-control']) !!}
</div>

<!-- Motivo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('motivo', 'Motivo:') !!}
    {!! Form::textarea('motivo', null, ['class' => 'form-control']) !!}
</div>

<!-- Tratamiento Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('tratamiento', 'Tratamiento:') !!}
    {!! Form::textarea('tratamiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consultas.index') !!}" class="btn btn-default">Cancel</a>
</div>
