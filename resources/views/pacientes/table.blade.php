<div class="table-responsive">
    <table class="table" id="pacientes-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha Nac.</th>
        <th>Dirección</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{!! $paciente->nombre !!}</td>
            <td>{!! $paciente->apellido !!}</td>
            <td>{!! $paciente->fecha_nac !!}</td>
            <td>{!! $paciente->direccion !!}</td>
                <td>
                    {!! Form::open(['route' => ['pacientes.destroy', $paciente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pacientes.show', [$paciente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pacientes.edit', [$paciente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
