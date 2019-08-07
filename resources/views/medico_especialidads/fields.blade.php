<!-- Id Medico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_medico', 'Médico:') !!}
    {{ Form::select('id_medico', $medicos, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
</div>

<!-- Id Especialidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_especialidad', 'Especialidad:') !!}
    {{ Form::select('id_especialidad', $especialidads, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('medicoEspecialidads.index') !!}" class="btn btn-default">Cancelar</a>
</div>
