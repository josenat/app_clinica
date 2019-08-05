<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pacienteMedico->id !!}</p>
</div>

<!-- Id Paciente Field -->
<div class="form-group">
    {!! Form::label('id_paciente', 'Id Paciente:') !!}
    <p>{!! $pacienteMedico->id_paciente !!}</p>
</div>

<!-- Id Medico Field -->
<div class="form-group">
    {!! Form::label('id_medico', 'Id Medico:') !!}
    <p>{!! $pacienteMedico->id_medico !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pacienteMedico->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pacienteMedico->updated_at !!}</p>
</div>

