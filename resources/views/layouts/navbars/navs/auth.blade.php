<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('img') }}/logo.svg" alt="Logo Full Balanzas" width="120">
        </div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ $activePage == 'inicio' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>
    @if(Session::get('rol') == 'admin')

        <hr class="sidebar-divider">
        <li class="nav-item {{ $activePage == 'usuario' ? ' active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusuario" aria-expanded="true" aria-controls="collapseusuario">
                <i class="fas fa-fw fa-users"></i>
                <span>Usuario</span>
            </a>
            <div id="collapseusuario" class="collapse {{ $activePage == 'usuario' ? ' show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ $activePage == 'usuario' ? ' active' : '' }}" href="{{ route('usuario.index') }}">Listado de Usuario</a>
                </div>
            </div>
        </li> 


    @endif
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>