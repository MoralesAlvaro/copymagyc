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
      <img src="img/logo/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">COPY MAGIC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <style>
        .user{
          height: 40px;
          width: 40px;
        }
      </style>
      <!-- Sidebar user panel (optional) -->
      <div class="mt-3 pb-3 mb-3 d-flex">
        <div class="image" data-toggle="dropdown">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2 user" alt="User Image">
        </div>
        <div class="dropdown-menu elevado max-w-x-small" role="menu">
          <a class="dropdown-item text-primary" href="#">Perfil</a>
          <a class="dropdown-item text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Cerrar Sesión') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
        <div class="info ml-2 mr-2">
          <a href="" class="d-block">{{Auth::user()->name}}</a>          
        </div>
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <x-group-link nameGroup="Modulo Usuarios"></x-group-link>
            <ul class="nav nav-treeview">
              <x-link-group link="{{ route('dashboard') }}" nameLink="Usuarios"></x-link-group>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>