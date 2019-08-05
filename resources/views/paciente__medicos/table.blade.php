<div class="table-responsive">
    <table class="table" id="pacienteMedicos-table">
        <thead>
            <tr>
                <th>Id Paciente</th>
        <th>Id Medico</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pacienteMedicos as $pacienteMedico)
            <tr>
                <td>{!! $pacienteMedico->id_paciente !!}</td>
            <td>{!! $pacienteMedico->id_medico !!}</td>
                <td>
                    {!! Form::open(['route' => ['pacienteMedicos.destroy', $pacienteMedico->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pacienteMedicos.show', [$pacienteMedico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pacienteMedicos.edit', [$pacienteMedico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
