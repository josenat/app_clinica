<!-- Id Paciente Med Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_paciente_med', 'Id Paciente Med:') !!}
    {!! Form::number('id_paciente_med', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Cita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_cita', 'Fecha Cita:') !!}
    {!! Form::date('fecha_cita', null, ['class' => 'form-control','id'=>'fecha_cita']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_cita').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('citas.index') !!}" class="btn btn-default">Cancel</a>
</div>
