<br>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class="fas fa-laptop"></i><span>Dashboard</span>
    </a>
    @can('borrar-rol')
        <a class="nav-link" href="/roles">
            <i class="fas fa-user-tag"></i><span>Roles</span>
        </a>
        <a class="nav-link" href="/usuarios">
            <i class="fas fa-user-lock"></i><span>Usuarios</span>
        </a>
        <a class="nav-link" href="/regional">
            <i class=" fas fa-building"></i><span>Regional</span>
        </a>
        <a class="nav-link" href="/funcionarios">
            <i class="fas fa-user-tie"></i><span>Funcionarios</span>
        </a>
        <a class="nav-link" href="/beneficiarios">
            <i class=" fa fa-users"></i><span>Beneficiarios</span>
        </a>
    @endcan
    @can('crear-contrato')
        <a class="nav-link" href="/contratos">
            <i class="fas fa-clipboard"></i><span>Contratos</span>
        </a>
        <a class="nav-link" href="/oservicios">
            <i class="fas fa-hands-helping"></i><span>Ord. de servicios</span>
        </a>
        <a class="nav-link" href="/oatencion">
            <i class=" fa fa-file f-center"></i><span>Ord. de atencion</span>
        </a>
    @endcan
    @can('crear-facturacion')
        <a class="nav-link" href="/facturador">
            <i class="fas fa-coins"></i><span>Facturacion</span>
        </a>
    @endcan
    @can('crear-auditoria')
        <a class="nav-link" href="/auditor">
            <i class="fab fa-black-tie"></i><span>Auditoria médica</span>
        </a>
    @endcan
    @can('borrar-rol')
        <a class="nav-link" href="/supervisor">
            <i class=" fas fa-id-card"></i><span>Supervision</span>
        </a>
        <a class="nav-link" href="/revjuridica">
            <i class=" fa fa-suitcase"></i><span>Juridico</span>
        </a>
        <a class="nav-link" href="/validador">
            <i class=" fas fa-check-circle"></i><span>Validacion</span>
        </a>
        <a class="nav-link" href="/tesoreria">
            <i class=" fas fa-money-check-alt"></i><span>Pagos/no-activo</span>
        </a>
         <a 
            <i class=""></i><span></span>
        </a>

    @endcan











</li>
