<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Sistema Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sistema', 'Sistema:') !!}
    {!! Form::text('sistema', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('enfermedads.index') !!}" class="btn btn-default">Cancel</a>
</div>
