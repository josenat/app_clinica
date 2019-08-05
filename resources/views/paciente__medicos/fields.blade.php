<!-- Id Paciente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_paciente', 'Id Paciente:') !!}
    {!! Form::number('id_paciente', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Medico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_medico', 'Id Medico:') !!}
    {!! Form::number('id_medico', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pacienteMedicos.index') !!}" class="btn btn-default">Cancel</a>
</div>
