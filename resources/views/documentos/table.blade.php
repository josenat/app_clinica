<div class="table-responsive">
    <table class="table" id="documentos-table">
        <thead>
            <tr>
                <th>Id Consulta</th>
        <th>Path</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documentos as $documento)
            <tr>
                <td>{!! $documento->id_consulta !!}</td>
            <td>{!! $documento->path !!}</td>
                <td>
                    {!! Form::open(['route' => ['documentos.destroy', $documento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('documentos.show', [$documento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('documentos.edit', [$documento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
