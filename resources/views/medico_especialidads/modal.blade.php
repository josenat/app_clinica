<!-- ******************** Ventana Modal ************************ -->
<div id="modal-medico-esp" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <label>Asignación de Especialidad</label>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label>Médico</label>
                        <select v-model="id_medico" class="form-control" @change="changeSelectMeEs()" required>
                            <option disabled value="">SELECCIONE</option>
                            <option v-for="medico in medicos" v-bind:value="medico.id">
                                @{{ medico.nombre }}
                            </option> 
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label>Especialidad</label>
                        <select v-model="id_especialidad" class="form-control" @change="changeSelectMeEs()" required>
                            <option disabled value="">SELECCIONE</option>
                            <option v-for="esp in especialidads" v-bind:value="esp.id">
                                @{{ esp.nombre }}
                            </option> 
                        </select>                      
                    </div>                                 
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">                          
                    <div class="row">        
                        <div class="pull-right">
                            <div class="container-fluid">
                                <button type="button" class="btn-save-medico-esp btn btn-primary" v-on:click="saveMedicoEsp(); limpiarMedicoEsp();" :disabled="buttonDisabled" data-dismiss="modal">Guardar</button>                             
                                <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="limpiarMedicoEsp()">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>                                
        </div>
    </div>
</div>