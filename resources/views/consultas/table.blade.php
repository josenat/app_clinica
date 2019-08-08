<div class="table-responsive">
    <table class="table" id="consultas-table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Enfermedad</th>
                <th>DNI Pac.</th>
                <th>Paciente</th>
                <th>DNI Med.</th>
                <th>Medico</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($consultas as $consulta)
            <tr>
                <td>{!! $consulta->created_at !!}</td>
                <td>{!! $consulta->enfermedad->nombre !!}</td>
                <td>{!! $consulta->paciente_medico->paciente->dni !!}</td>
                <td>{!! $consulta->paciente_medico->paciente->nombre !!}</td> 
                <td>{!! $consulta->paciente_medico->medico->dni !!}</td> 
                <td>{!! $consulta->paciente_medico->medico->nombre !!}</td> 
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
