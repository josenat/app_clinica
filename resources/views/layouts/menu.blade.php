
<li class="{{ Request::is('enfermedads*') ? 'active' : '' }}">
    <a href="{!! route('enfermedads.index') !!}"><i class="fa fa-edit"></i><span>Enfermedades</span></a>
</li>

<li class="{{ Request::is('pacientes*') ? 'active' : '' }}">
    <a href="{!! route('pacientes.index') !!}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
</li>

<li class="{{ Request::is('citas*') ? 'active' : '' }}">
    <a href="{!! route('citas.index') !!}"><i class="fa fa-edit"></i><span>Citas Médicas</span></a>
</li>

<li class="{{ Request::is('consultas*') ? 'active' : '' }}">
    <a href="{!! route('consultas.index') !!}"><i class="fa fa-edit"></i><span>Consultas Médicas</span></a>
</li>

<li class="{{ Request::is('medicos*') ? 'active' : '' }}">
    <a href="{!! route('medicos.index') !!}"><i class="fa fa-edit"></i><span>Medicos</span></a>
</li>

<li class="{{ Request::is('especialidads*') ? 'active' : '' }}">
    <a href="{!! route('especialidads.index') !!}"><i class="fa fa-edit"></i><span>Especialidades Médicas</span></a>
</li>