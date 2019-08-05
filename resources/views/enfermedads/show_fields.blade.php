<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $enfermedad->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $enfermedad->nombre !!}</p>
</div>

<!-- Sistema Field -->
<div class="form-group">
    {!! Form::label('sistema', 'Sistema:') !!}
    <p>{!! $enfermedad->sistema !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $enfermedad->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $enfermedad->updated_at !!}</p>
</div>

