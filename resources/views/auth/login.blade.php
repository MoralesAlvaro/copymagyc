@extends('layouts.auth')

<div class="container">
  <!-- Mensaje de confirmación -->
  @if (session('success'))
  <div class="mx-4 ml-8">
      <div class="card-body">
          <div class="alert alert-success text-center msg alert-dismissible fade show" id="success" role="alert">
              <strong>{{ session('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
  </div>
  @endif

  @if (session('warning'))
  <div class="mx-1 ml-8">
      <div class="card-body">
          <div class="alert alert-warning text-center msg alert-dismissible fade show" id="success" role="alert">
              <strong>{{ session('warning') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
  </div>
  @endif
  <!-- EDN Mensaje de confirmación -->
</div>
<!-- Main content -->
@section('content')
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <span><img style="width:35%" src="{{url('img/logo/logo.jpeg')}}" alt=""></span>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><strong>Iniciar sesión</strong></p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group mb-3">
                <input name="email" type="email" class="form-control" placeholder="Correo electrónico">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="email"/>
              </div>
              <div class="input-group mb-3">
                <input name="password" type="password" class="form-control" placeholder="Contraseña">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <x-auth-validation-errors class="" :errors="$errors" campo="email"/>
              </div>
              <div class="row">
                <!-- /.col -->
                <button type="submit" class="btn btn-info btn-block">Iniciar</button>
                <!-- /.col -->
              </div>
            </form>
      
            <p class="mb-1">
              <a href="{{url('forgot-password')}}">Olvide mi contraseña</a>
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      @endsection

