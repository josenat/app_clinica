<li class="header text-center"> Menú </li>

<li class="treeview active">
    <a href="#" class="item-title"><i class="fa fa-link"></i> <span>Datos Básicos</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
    </a>
    <ul class="treeview-menu">
		<li class="{{ Request::is('medicos*') ? 'active' : '' }}">
		    <a href="{!! route('medicos.index') !!}"><i class="fa fa-edit"></i><span>Medicos</span></a>
		</li>
		<li class="{{ Request::is('especialidads*') ? 'active' : '' }}">
		    <a href="{!! route('especialidads.index') !!}"><i class="fa fa-edit"></i><span>Especialidades</span></a>
		</li>
		<li class="{{ Request::is('pacientes*') ? 'active' : 'true' }}">
		    <a href="{!! route('pacientes.index') !!}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
		</li>

		<li class="{{ Request::is('enfermedads*') ? 'active' : '' }}">
		    <a href="{!! route('enfermedads.index') !!}"><i class="fa fa-edit"></i><span>Enfermedades</span></a>
		</li>		
    </ul>
</li>        

<li class="{{ Request::is('citas*') ? 'active' : '' }}">
    <a href="{!! route('citas.index') !!}"><i class="fa fa-edit"></i><span>Citas Médicas</span></a>
</li>

<li class="{{ Request::is('consultas*') ? 'active' : '' }}">
    <a href="{!! route('consultas.index') !!}"><i class="fa fa-edit"></i><span>Consultas Médicas</span></a>
</li>

<li class="{{ Request::is('image-gallery*') ? 'active' : '' }}">
    <a href="{!! url('image-gallery') !!}"><i class="fa fa-edit"></i><span>Imágenes Consultas</span></a>
</li>

<li class="{{ Request::is('medico_especialidads*') ? 'active' : '' }}">
    <a href="{!! route('medicoEspecialidads.index') !!}"><i class="fa fa-edit"></i><span>Gestión Especialidad</span></a>
</li>