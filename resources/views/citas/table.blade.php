<div class="table-responsive">
    <table class="table" id="citas-table">
        <thead>
            <tr>
                <th>Id Paciente Med</th>
        <th>Fecha Cita</th>
        <th>Observación</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($citas as $cita)
            <tr>
                <td>{!! $cita->id_paciente_med !!}</td>
            <td>{!! $cita->fecha_cita !!}</td>
            <td>{!! $cita->observacion !!}</td>
                <td>
                    {!! Form::open(['route' => ['citas.destroy', $cita->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('citas.show', [$cita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('citas.edit', [$cita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
