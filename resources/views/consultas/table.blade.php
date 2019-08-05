<div class="table-responsive">
    <table class="table" id="consultas-table">
        <thead>
            <tr>
                <th>Id Paciente Med</th>
        <th>Id Enfermedad</th>
        <th>Motivo</th>
        <th>Tratamiento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($consultas as $consulta)
            <tr>
                <td>{!! $consulta->id_paciente_med !!}</td>
            <td>{!! $consulta->id_enfermedad !!}</td>
            <td>{!! $consulta->motivo !!}</td>
            <td>{!! $consulta->tratamiento !!}</td>
                <td>
                    {!! Form::open(['route' => ['consultas.destroy', $consulta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('consultas.show', [$consulta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('consultas.edit', [$consulta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
