<div class="table-responsive">
    <table class="table" id="medicos-table">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($medicos as $medico)
            <tr>
                <td>{!! $medico->dni !!}</td>
                <td>{!! $medico->nombre !!}</td>
                <td>{!! $medico->apellido !!}</td>
                <td>{!! $medico->direccion !!}</td>
                <td>
                    {!! Form::open(['route' => ['medicos.destroy', $medico->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('medicos.show', [$medico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('medicos.edit', [$medico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
