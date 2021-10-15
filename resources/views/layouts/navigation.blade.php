<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('dashboard')}}" class="nav-link">Home</a>
        </li>
</nav>
</ul>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('dashboard')}}" class="brand-link">
        <img src="{{url('img/logo/logo_letras.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3 pt-2"
            style="opacity: .8">
        <span class="brand-text font-weight-light">.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <style>
            .user {
                height: 40px;
                width: 40px;
            }
        </style>
        <!-- Sidebar user panel (optional) -->
        <div class="mt-3 pb-3 mb-3 d-flex">
            <div class="image" data-toggle="dropdown">
                <img src="{{Auth::user()->avatar}}" class="img-circle elevation-2 user" alt="User Image">
            </div>
            <div class="dropdown-menu elevado max-w-x-small" role="menu">
                <a class="dropdown-item text-primary" href="{{ route('user.show',Auth::user()->id)}}">Perfil</a>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="info ml-2 mr-2">
                <a href="" class=" ">{{Auth::user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <x-group-link nameGroup="Módulo Clientes"><i class="fas fa-vote-yea"></i></x-group-link>
                    <ul class="nav nav-treeview">
                        <x-link-group link="{{ route('customers.index') }}" nameLink="Clientes"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                    </ul>
                </li>
                <li class="nav-item">
                    <x-group-link nameGroup="Módulo Materia Prima"><i class="fas fa-store-alt"></i></x-group-link>
                    <ul class="nav nav-treeview">
                        <x-link-group link="{{ route('rawMaterials.index') }}" nameLink="Materia Prima"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                        <x-link-group link="{{ route('stationeryTypes.index') }}" nameLink="Tipo de Materia Prima"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                    </ul>
                </li>
                <li class="nav-item">
                    <x-group-link nameGroup="Módulo Reportes"><i class="fas fa-file-medical-alt"></i></x-group-link>
                    <ul class="nav nav-treeview">
                        <x-link-group link="{{ route('activity_raw.mount') }}" nameLink="Reporte Mensual"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                        <x-link-group link="{{ route('dashboard') }}" nameLink="Reporte por Fecha"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                    </ul>
                </li>
                <li class="nav-item">
                    <x-group-link nameGroup="Módulo Proveedores"><i class="fas fa-cart-arrow-down"></i></x-group-link>
                    <ul class="nav nav-treeview">
                        <x-link-group link="{{ route('supplier.index') }}" nameLink="Proveedores"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                    </ul>
                </li>
                <li class="nav-item">
                    <x-group-link nameGroup="Módulo Usuarios"><i class="fas fa-users"></i></x-group-link>
                    <ul class="nav nav-treeview">
                        <x-link-group link="{{ route('user.index') }}" nameLink="Usuarios"><i
                                class="fas fa-vote-yea"></i></x-link-group>
                    </ul>
                </li>
                <li class="nav-item">
                    <x-group-link nameGroup="Parametros"><i class="fas fa-sliders-h"></i></x-group-link>
                    <ul class="nav nav-treeview">
                        <x-link-group link="{{ route('parameter.show') }}" nameLink="Parametros"><i
                                class="fas fa-cog"></i></x-link-group>

                        <x-link-group link="{{ route('parameter.edit') }}" nameLink="Editar Parametros"><i
                                class="fas fa-cog"></i></x-link-group>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>