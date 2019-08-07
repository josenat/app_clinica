
/**
* Primero cargaremos todas las dependencias de JavaScript para este proyecto 
* que incluye Vue y otras bibliotecas. Es un gran punto de inicio cuando
* creamos aplicaciones web robustas y potentes usando Vue y Laravel.
*/
require('./bootstrap'); 

// importar idioma fullcalendar
// import 'fullcalendar/dist/locale/es.js';

// importar datepicker vue js
// import DatePicker from 'vue2-datepicker'; 

// importar timepicker vue js
import VueClockPicker from '@pencilpix/vue2-clock-picker';
import '@pencilpix/vue2-clock-picker/dist/vue2-clock-picker.min.css';	

// importar barra de progreso
import VueProgressBar from 'vue-progressbar';

// configurar barra de progreso
Vue.use(VueProgressBar, {
  color       : '#7ba428',
  height      : '2px',
  failedColor : 'red'  
});

// obtener fecha actual
function getFecha() {
	var date  = new Date();
	var fecha = date.getFullYear() + '/' + (date.getMonth()+1) + '/' + date.getDate();
	return fecha; 
}

// obtener hora actual
function getTiempo() {	
	var date    = new Date();
	var minutos = (date.getMinutes() < 10) ? ('0' + date.getMinutes()) : date.getMinutes(); 
	var tiempo  = date.getHours() + ':' + minutos;
	return tiempo;	
}

// inicializar variables
var fecha  = getFecha();
var tiempo = getTiempo();

/**
* A continuación, crearemos una nueva instancia de la aplicación Vue y la asociaremos 
* a la página. Entonces, puede comenzar a agregar componentes a esta aplicación
* o personalice el andamio JavaScript para que se ajuste a sus necesidades únicas.
*/

//-----------------------------------------------------------------------------------
// objeto vue del elemento de clase "app-content"
new Vue({
	// elemento de ambito donde funcionará el objeto vue
	el: ".app-content",
	// componentes vue js
	components: { 
		//DatePicker,
		VueClockPicker 
	},	
	// variables del objeto vue
	data: {
		//*********************** Datos Generales ************************************
		// encabezados para cada solicitud
		headers        : {
			"Content-Type" : "application/json",
			"Accept"       : "application/json",
			"Authorization": ""
		}, 		
		// configuracion datepicker
		lang  : {
			days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			months: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			pickers: ['próximos 7 días', 'próximos 30 días', '7 días anteriores', '30 días anteriores'],
			placeholder: {
				date: 'Seleccione fecha',
				dateRange: 'Seleccione rango de fechas'
			}
		},		
		// nuevas variables 
		newFecha    : fecha,
		newHora     : tiempo,	
		// variable bandera
		exito          : true,		
		// arreglo de errores de operación
		errors: [],		
		//****************************************************************************


		//*********************** Variables del Recurso 'Pacientes' ******************
		// identificador del recurso
		uriPaciente: 'pacientes',
		// coleccion de datos
		pacientes: [],
		// arreglo auxiliar para contener los nuevos datos a actualizar
		arrayPaciente      : {
			id:'', dni:'', nombre:'', apellido:'', fecha_nac:'', direccion:''
		},		
		// variables auxiliares para contener los nuevos datos a registrar
		newDni       : '',
		newNombre    : '',
		newApellido  : '',
		newFecha_nac : '',
		newDireccion : '',	
		//****************************************************************************


		//*********************** Variables del Recurso 'Citas' **********************
		// identificador del recurso
		uriCita: 'citas',		
		// coleccion de datos
		citas: [],
		// arreglo auxiliar para contener los nuevos datos a actualizar
		arrayCita      : {
			id:'', id_paciente_med:'', fecha_cita:'', observacion:''
		},		
		// variables auxiliares para contener los nuevos datos a registrar 
		newId_paciente_med : '',
		newFecha_cita      : '',
		newObservacion     : '',
		//****************************************************************************


		//*********************** Variables del Recurso 'Consultas' ******************
		// identificador del recurso
		uriConsulta: 'consultas',		
		// coleccion de datos
		consultas: [],
		// arreglo auxiliar para contener los nuevos datos a actualizar
		arrayConsulta      : {
			id:'', id_paciente_med:'', id_enfermedad:'', motivo:'', 
			tratamiento:'', id_documento:'',			
		},									
		// variables auxiliares para contener los nuevos datos a registrar
		newId_paciente_med : '',
		newId_enfermedad   : '',
		newMotivo          : '',
		newTratamiento     : '',
		newId_documento    : '',	
		//****************************************************************************


		//*********************** Variables del Recurso 'Medicos' ********************
		// identificador del recurso
		uriMedico: 'medicos',		
		// coleccion de datos
		medicos: [],
		// arreglo auxiliar para contener los nuevos datos a actualizar
		arrayMedico      : {
			id:'', dni:'', nombre:'', apellido:'', direccion:'', contrato:''
		},	
		// variables auxiliares para contener los nuevos datos a registrar
		newDni       : '',
		newNombre    : '',
		newApellido  : '',
		newDireccion : '',
		newContrato  : '',		
		//****************************************************************************	


		//***************** Variables del Recurso 'MedicoEspecialidad' ***************
		// identificador del recurso
		uriMedicoEsp  : 'medicoEspecialidads',		
		uriMedico     : 'medicos',
		uriEsp        : 'especialidads',
		// coleccion de datos
		medicoEsps    : [],
		medicos       : [],
		especialidads : [],		
		// variables auxiliares para contener los nuevos datos a guardar	
		id_medico_esp   : '',	
		id_medico       : '',
		id_especialidad : '',
		// variables generales				
		buttonDisabled     : true,	
		//****************************************************************************	
				
	},
	// cuando el objeto vue se termine de crear
	created: function() {	
		// inicializar metodo
		this.getMedicoEsps();
	},
	// cuando se haya completado el DOM
	ready: function () {
		//
	},	
	// metodos del objeto vue
	methods: {

		//****************** Metodos del Recurso 'MedicoEspecialidad' ****************

		getMedicoEsps: function() {  
			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriMedicoEsp, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.medicoEsps = response.data;
			});

			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriMedico, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.medicos = response.data;	 	
			});

			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriEsp, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.especialidads = response.data;		
			});		
			  
		},			

		editMedicoEsp: function(medicoEsp) { 
			this.id_medico_esp    = medicoEsp.id;			
			this.id_medico        = medicoEsp.id_medico;
			this.id_especialidad  = medicoEsp.id_especialidad;
		},	

		deleteMedicoEsp: function() {
			var uri = this.uriMedicoEsp +'/'+ this.id_medico_esp;
			axios.delete(uri)
			.then(response => {  
				// si se elimino exitosamente
				if (response.data == 1) {
					// actualizar lista de registros
					this.getMedicoEsps();
					toastr.success('Eliminación exitosa');	
					// limpiar arreglo auxiliar para nuevos datos					
					this.id_medico       = '';
					this.id_especialidad = '';
					this.errors             = []; 					
				} else {
					toastr.error('Error de operación');
				}										
			});	
		},		
			
		saveMedicoEsp: function() {
			// si es una operacion de actualizacion, debe existir el recurso a actualizar
			var id = this.id_medico_esp;
			if (id > 0) {
				var uri = this.uriMedicoEsp +'/'+ id;
				axios.put(uri, {id : this.id_medico_esp, id_medico : this.id_medico, id_especialidad : this.id_especialidad})
				.then(response => {	 
				// si se actualizo exitosamente
				if (response.data == 1) {							
					this.getMedicoEsps();
					toastr.success('Actualización exitosa');
					this.errors = [];	
				}	
				})
				.catch(error => {
					this.errors = error.response.data
				});					;
			// de lo contrario es una operacion de nuevo registro de recurso
			} else {
				var uri = this.uriMedicoEsp;
				axios.post(uri, {
						id_medico       : this.id_medico, 
						id_especialidad : this.id_especialidad    							
					}, {
						headers : this.headers
				})
				.then(response => {
					if (response.data == 1) {
						this.getMedicoEsps();
						toastr.success('Registro exitoso');	
						// limpiar arreglo auxiliar para nuevos datos					
						this.id_medico       = '';
						this.id_especialidad = '';
						this.errors             = []; 					
					} else {
						toastr.error('Error de operación');
					}
	 									
				})
				.catch(error => {
					this.errors = error.response.data
				});				
			}
		},	

		changeSelectMeEs: function() {
			if (this.id_medico > 0 && this.id_especialidad > 0) {
				// verificar si ya existe la relacion entre medico y especialidad
				axios.get(this.uriMedicoEsp, {
	    			params: {
	    				id_medico       : this.id_medico, 
	    				id_especialidad : this.id_especialidad,
	    				operacion       : 'validar'
	    			} 
	    		})
				// si se ejecutó correctamente
				.then(response => {
					if (response.data == 1) {
						toastr.warning('¡Esta asignación ya existe!');
						this.buttonDisabled = true;
					} else {
						toastr.success('¡Asignación disponible!');
						this.buttonDisabled = false;
					}
					
				});				
			}
		},				

		limpiarMedicoEsp: function(boolean) {
			// limpiar formulario
			this.id_medico_esp   = '';
			this.id_medico       = '';
			this.id_especialidad = '';		
		},			

		//*********************** Metodos del Recurso 'Pacientes' ********************

		getPacientes: function() {  
			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriPaciente, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.pacientes = response.data;
				// finalizar barra de progreso
				this.$Progress.finish();		
			});
		},

		editPaciente: function(paciente) {
			this.arrayPaciente.id        = paciente.id;
			this.arrayPaciente.dni       = paciente.dni;
			this.arrayPaciente.nombre    = paciente.nombre;
			this.arrayPaciente.apellido  = paciente.apellido; 
			this.arrayPaciente.fecha_nac = paciente.fecha_nac.split("/").reverse().join("/");
			this.arrayPaciente.direccion = paciente.direccion;

			$("#edit").modal("show");
		},	

		updatePaciente: function(id) {  
			var uri = this.uriPaciente +'/'+ id;
			axios.put(uri, this.arrayPaciente)
			.then(response => {				
				this.getPacientes();
				$('#edit').modal('hide');
				toastr.success('Actualización exitosa');
				// limpiar arreglo auxiliar 
				this.arrayPaciente = {
					id        : '', 
					dni       : '',
					nombre    : '', 
					apellido  : '',
					fecha_nac : '',
					direccion : ''
				};
				this.errors = [];		
			});
		},	

		deletePaciente: function(id) {
			var uri = this.uriPaciente +'/'+ id;
			axios.delete(uri)
			.then(response => {
				this.getPacientes();
				toastr.success('Eliminación exitosa');
			});
		},
			
		storePaciente: function() {
			var uri = this.uriPaciente;
			axios.post(uri, {
					dni       : this.newDni, 
					nombre    : this.newNombre,
					apellido  : this.newApellido,     
					fecha_nac : this.newFecha_nac,
					direccion : this.newDireccion,     							
				}, {
					headers : this.headers
			})
			.then(response => {
				// this.getPacientes();
				$('#create').modal('hide');
				toastr.success('Registro exitoso');	
				// limpiar arreglo auxiliar para nuevos datos					
				this.newDni       = '';
				this.newNombre    = '';								
				this.newApellido  = '';
				this.newFecha_nac = '';
				this.newDireccion = '';
				this.errors       = [];  									
			})
			.catch(error => {
				this.errors = error.response.data
			});
		},


		//*********************** Metodos del Recurso 'Citas' ************************

		getCitas: function() {  
			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriCita, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.citas = response.data;
				// finalizar barra de progreso
				this.$Progress.finish();		
			});
		},

		editCita: function(cita) {
			this.arrayCita.id              = cita.id;
			this.arrayCita.id_paciente_med = cita.id_paciente_med;
			this.arrayCita.fecha_cita      = cita.fecha_cita;
			this.arrayCita.observacion     = cita.observacion; 

			$("#edit").modal("show");
		},	

		updateCita: function(id) {  
			var uri = this.uriCita+'/'+id;
			axios.put(uri, this.arrayCita)
			.then(response => {				
				// this.getCitas();
				// $('#edit').modal('hide');
				toastr.success('Actualización exitosa');
				// limpiar arreglo auxiliar 
				this.arrayCita = {
					id              : '', 
					id_paciente_med : '',
					fecha_cita      : '', 
					observacion     : '',
				};
				this.errors = [];		
			});
		},	

		deleteCita: function(id) {
			var uri = this.uriCita+'/'+id;
			axios.delete(uri)
			.then(response => {
				this.getMedicos();
				toastr.success('Eliminación exitosa');
			});
		},
			
		storeCita: function() {
			var uri = this.uriCita;
			axios.post(uri, {
					id_paciente_med : this.newId_paciente_med, 
					fecha_cita      : this.newFecha_cita,
					observacion     : this.newObservacion,					         							
				}, {
					headers : this.headers
			})
			.then(response => {
				// this.getCitas();
				// $('#create').modal('hide');
				toastr.success('Registro exitoso');	
				// limpiar arreglo auxiliar para nuevos datos					
				this.newId_paciente_med = '';
				this.newFecha_cita      = '';								
				this.newObservacion     = '';
				this.errors       = [];  									
			})
			.catch(error => {
				this.errors = error.response.data
			});
		},


		//*********************** Metodos del Recurso 'Consultas' ******************

		getConsultas: function() {  
			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriConsultas, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.pacientes = response.data;
				// finalizar barra de progreso
				this.$Progress.finish();		
			});
		},

		editConsulta: function(consulta) {
			this.arrayConsulta.id              = consulta.id;
			this.arrayConsulta.id_paciente_med = consulta.id_paciente_med;
			this.arrayConsulta.id_enfermedad   = consulta.id_enfermedad;
			this.arrayConsulta.motivo          = consulta.motivo; 
			this.arrayConsulta.tratamiento     = consulta.tratamiento;
			this.arrayConsulta.id_documento    = consulta.id_documento;

			$("#edit").modal("show");
		},	

		updateConsulta: function(id) {  
			var uri = this.uriConsultas+'/'+id;
			axios.put(uri, this.arrayConsulta)
			.then(response => {				
				//this.getConsultas();
				//$('#edit').modal('hide');
				toastr.success('Actualización exitosa');
				// limpiar arreglo auxiliar 
				this.arrayConsulta = {
					id              : '', 
					id_paciente_med : '',
					id_enfermedad   : '', 
					motivo          : '',
					tratamiento     : '',
					id_documento    : ''
				};
				this.errors = [];		
			});
		},	

		deleteConsulta: function(id) {
			var uri = this.uriConsultas+'/'+id;
			axios.delete(uri)
			.then(response => {
				this.getConsultas();
				toastr.success('Eliminación exitosa');
			});
		},
			
		storeConsulta: function() {
			var uri = this.uriConsultas;
			axios.post(uri, {
					id_paciente_med : this.newId_paciente_med, 
					id_enfermedad   : this.newId_enfermedad,
					motivo          : this.newMotivo,     
					tratamiento     : this.newTratamiento,
					id_documento    : this.newId_documento,     							
				}, {
					headers : this.headers
			})
			.then(response => {
				// this.getConsultas();
				// $('#create').modal('hide');
				toastr.success('Registro exitoso');	
				// limpiar arreglo auxiliar para nuevos datos					
				this.newId_paciente_med = '';
				this.newId_enfermedad   = '';								
				this.newMotivo          = '';
				this.newTratamiento     = '';
				this.newId_documento    = '';
				this.errors             = [];  									
			})
			.catch(error => {
				this.errors = error.response.data
			});
		},


		//*********************** Metodos del Recurso 'Medicos' ********************

		getMedicos: function() {  
			// ejecutar ruta en el uri del navegador a través del método get
			axios.get(this.uriMedico, {headers : this.headers})
			// si se ejecutó correctamente
			.then(response => {
				this.medicos = response.data;
				// finalizar barra de progreso
				this.$Progress.finish();		
			});
		},

		editMedico: function(medico) {
			this.arrayMedico.id        = medico.id;
			this.arrayMedico.dni       = medico.dni;
			this.arrayMedico.nombre    = medico.nombre;
			this.arrayMedico.apellido  = medico.apellido; 
			this.arrayMedico.direccion = medico.direccion;
			this.arrayMedico.contrato  = medico.contrato;

			$("#edit").modal("show");
		},	

		updateMedico: function(id) {  
			var uri = this.uriMedico+'/'+id;
			axios.put(uri, this.arrayMedico)
			.then(response => {				
				// this.getMedicos();
				// $('#edit').modal('hide');
				toastr.success('Actualización exitosa');
				// limpiar arreglo auxiliar 
				this.arrayMedico = {
					id        : '', 
					dni       : '',
					nombre    : '', 
					apellido  : '',
					direccion : '',
					contrato  : ''
				};
				this.errors = [];		
			});
		},	

		deleteMedico: function(id) {
			var uri = this.uriMedico+'/'+id;
			axios.delete(uri)
			.then(response => {
				this.getMedicos();
				toastr.success('Eliminación exitosa');
			});
		},
			
		storeMedico: function() {
			var uri = this.uriMedico;
			axios.post(uri, {
					dni       : this.newDni, 
					nombre    : this.newNombre,
					apellido  : this.newApellido,     
					direccion : this.newDireccion,
					contrato  : this.newContrato,     							
				}, {
					headers : this.headers
			})
			.then(response => {
				// this.getMedicos();
				// $('#create').modal('hide');
				toastr.success('Registro exitoso');	
				// limpiar arreglo auxiliar para nuevos datos					
				this.newDni       = '';
				this.newNombre    = '';								
				this.newApellido  = '';
				this.newDireccion = '';
				this.newContrato  = '';
				this.errors       = [];  									
			})
			.catch(error => {
				this.errors = error.response.data
			});
		},


		//**************************** Metodos Generales ***************************
		
		timeChange: function() {
			// guardar nueva hora plugin en el siguiente input
            $('.hora').val(this.newHora); 	
		},		

	},

		
});



//-----------------------------------------------------------------------------------