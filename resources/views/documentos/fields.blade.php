<!-- Id Consulta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_consulta', 'Id Consulta:') !!}
    {!! Form::number('id_consulta', null, ['class' => 'form-control']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('path', 'Path:') !!}
    {!! Form::file('path') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
