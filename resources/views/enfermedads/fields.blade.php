<!-- Sistema Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sistema', 'Sistema:') !!}
    {!! Form::select('sistema', ['RESPIRATORIO' => 'RESPIRATORIO','CIRCULATORIO'=>'CIRCULATORIO','DIGESTIVO'=>'DIGESTIVO'], 
    null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'id' => 'btn-guardar']) !!}
    <a href="{!! route('enfermedads.index') !!}" class="btn btn-default">Cancelar</a>
</div>
