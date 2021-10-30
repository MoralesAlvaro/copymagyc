@extends('layouts.auth')
{{-- Notification --}}
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
        <p class="login-box-msg"><strong>Recuperar Contraseña</strong></p>

        <form method="POST" action="{{ url('forgot-password') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <x-auth-validation-errors class="" :errors="$errors" campo="email" />
            <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <x-auth-validation-errors class="" :errors="$errors" campo="password"/>
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" placeholder="Confirmar contraseña">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <p class="mt-3 mb-1">
            <a href="{{url('login')}}">Login</a>
        </p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection