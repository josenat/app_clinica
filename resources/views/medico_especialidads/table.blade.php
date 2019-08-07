<div class="table-responsive">
    <table class="table" id="medicoEspecialidads-table">
        <thead>
            <tr>
                <th>DNI Med.</th>
                <th>Médico</th>
                <th>Especialidad</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="key in medicoEsps" v-cloak>
                <td>@{{ key.dni_medico }}</td>
                <td>@{{ key.nombre_medico }}</td>
                <td>@{{ key.nombre_especialidad }}</td>
                <td>
                    <div class='btn-group'>
                        <!-- boton editar -->
                        <button class='btn btn-default btn-xs' v-on:click="editMedicoEsp(key)" data-toggle="modal" data-target="#modal-medico-esp"><i class="glyphicon glyphicon-edit"></i></button>
                        <!-- boton eliminar -->
                        <button class="btn btn-danger btn-xs" v-on:click="id_medico_esp = key.id" data-toggle="modal" data-target="#confirm-delete"  ><i class="glyphicon glyphicon-trash"></i></button>
                    </div>                   
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ventana modal para confirmar eliminacion -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="confirm-delete" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Confirmar eliminación</h4>
            </div>
            <div class="modal-body">
                <p>Está a punto de eliminar el registro <b> <i class="title"> </i> </b>, este procedimiento es irreversible. </p>
                <p> ¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" v-on:click="deleteMedicoEsp()">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div> 