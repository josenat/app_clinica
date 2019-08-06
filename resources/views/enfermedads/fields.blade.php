<!-- Sistema Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sistema', 'Sistema:') !!}
    {!! Form::select('sistema', [null => 'SELECCIONE'] + ['RESPIRATORIO' => 'RESPIRATORIO','CIRCULATORIO'=>'CIRCULATORIO','DIGESTIVO'=>'DIGESTIVO'], 
    null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'disabled']) !!}
</div>

@section('scripts')
    <script type="text/javascript">   	
        $('#sistema').change(function() { 
    		$('#nombre').prop('disabled', false);
    		$('#btn-guardar').prop('disabled', false);        	
        });         
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'id' => 'btn-guardar', 'disabled']) !!}
    <a href="{!! route('enfermedads.index') !!}" class="btn btn-default">Cancelar</a>
</div>
