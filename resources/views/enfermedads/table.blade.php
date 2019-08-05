<div class="table-responsive">
    <table class="table" id="enfermedads-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Sistema</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($enfermedads as $enfermedad)
            <tr>
                <td>{!! $enfermedad->nombre !!}</td>
            <td>{!! $enfermedad->sistema !!}</td>
                <td>
                    {!! Form::open(['route' => ['enfermedads.destroy', $enfermedad->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('enfermedads.show', [$enfermedad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('enfermedads.edit', [$enfermedad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
