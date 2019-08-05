<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $documento->id !!}</p>
</div>

<!-- Id Consulta Field -->
<div class="form-group">
    {!! Form::label('id_consulta', 'Id Consulta:') !!}
    <p>{!! $documento->id_consulta !!}</p>
</div>

<!-- Path Field -->
<div class="form-group">
    {!! Form::label('path', 'Path:') !!}
    <p>{!! $documento->path !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $documento->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $documento->updated_at !!}</p>
</div>

