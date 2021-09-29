@extends('layouts.auth')

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
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Recuerdame
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-info btn-block">Iniciar</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            {{-- <div class="social-auth-links text-center mt-2 mb-3">
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div> --}}
            <!-- /.social-auth-links -->
      
            <p class="mb-1">
              <a href="forgot-password.html">Olvide mi contraseña</a>
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      @endsection

